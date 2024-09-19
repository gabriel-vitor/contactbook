<template>
  <div class="container mt-5">
    <h2>Lista de Contatos</h2>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>Nome</th>
          <th>Telefone</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="contact in contacts" :key="contact.id">
          <td>{{ contact.id }}</td>
          <td>{{ contact.name }}</td>
          <td>{{ contact.phone }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  name: 'ContactList',
  data() {
    return {
      contacts: []
    };
  },
  mounted() {
    this.fetchContacts();
  },
  methods: {
    async fetchContacts() {
      try {
        const response = await fetch('/api/contacts'); // Ajuste a URL conforme sua configuração
        if (!response.ok) throw new Error('Network response was not ok');
        this.contacts = await response.json();
      } catch (error) {
        console.error('Failed to fetch contacts:', error);
      }
    }
  }
};
</script>

<style scoped>
/* Adicione estilos específicos do componente aqui */
.table {
  margin-top: 20px;
}
</style>
