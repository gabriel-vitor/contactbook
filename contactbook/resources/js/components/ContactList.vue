<template>
    <div>
      <h2>Lista de Contatos</h2>
      <button @click="showCreateForm = true" class="btn btn-success mb-2">Adicionar Contato</button>
  
      <!-- Formulário de Criação -->
      <div v-if="showCreateForm">
        <form @submit.prevent="createContact">
          <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" v-model="newContact.name" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="phone">Telefone</label>
            <input type="text" v-model="newContact.phone" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-primary">Salvar</button>
          <button @click="showCreateForm = false" class="btn btn-secondary">Cancelar</button>
        </form>
      </div>
  
      <!-- Tabela de Contatos -->
      <table class="table table-striped mt-3">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="contact in contacts" :key="contact.id">
            <td>{{ contact.name }}</td>
            <td>{{ contact.phone }}</td>
            <td>
              <button @click="editContact(contact)" class="btn btn-primary">Editar</button>
              <button @click="deleteContact(contact.id)" class="btn btn-danger">Excluir</button>
            </td>
          </tr>
        </tbody>
      </table>
  
      <!-- Formulário de Edição -->
      <div v-if="showEditForm">
        <form @submit.prevent="updateContact">
          <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" v-model="currentContact.name" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="phone">Telefone</label>
            <input type="text" v-model="currentContact.phone" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-primary">Atualizar</button>
          <button @click="showEditForm = false" class="btn btn-secondary">Cancelar</button>
        </form>
      </div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        contacts: [],
        newContact: {
          name: '',
          phone: ''
        },
        currentContact: {},
        showCreateForm: false,
        showEditForm: false
      };
    },
    mounted() {
      this.getContacts();
    },
    methods: {
      getContacts() {
        axios.get('/api/contacts')
          .then(response => {
            this.contacts = response.data;
          });
      },
      createContact() {
        axios.post('/api/contacts', this.newContact)
          .then(response => {
            this.contacts.push(response.data);
            this.newContact = { name: '', phone: '' };
            this.showCreateForm = false;
          });
      },
      editContact(contact) {
        this.currentContact = { ...contact };
        this.showEditForm = true;
      },
      updateContact() {
        axios.put(`/api/contacts/${this.currentContact.id}`, this.currentContact)
          .then(response => {
            this.getContacts();
            this.currentContact = {};
            this.showEditForm = false;
          });
      },
      deleteContact(id) {
        axios.delete(`/api/contacts/${id}`)
          .then(response => {
            this.getContacts();
          });
      }
    }
  }
  </script>
  
  <style scoped>
  /* Estilos específicos do componente */
  </style>
  