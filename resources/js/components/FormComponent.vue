<template>
  <section class="card my-4">
    <div class="card-header">Formulário</div>
    <div class="card-body">
      <div :class="['alert', messageClass]" role="alert">{{ message }}</div>
      <form @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="name">Nome Completo</label>
            <input
              type="text"
              :class="['form-control', { 'is-invalid' : form.errors.has('name')}]"
              id="name"
              name="name"
              v-model="form.name"
              placeholder="Digite seu nome completo"
              required
            />
            <div
              class="invalid-feedback"
              v-if="form.errors.has('name')"
              v-text="form.errors.first('name')"
            ></div>
          </div>
          <div class="form-group col-md-4">
            <label for="email">E-mail</label>
            <input
              type="email"
              :class="['form-control', { 'is-invalid' : form.errors.has('email')}]"
              id="email"
              name="email"
              v-model="form.email"
              placeholder="Digite seu e-mail"
              required
            />
            <div class="invalid-feedback" v-text="form.errors.first('email')"></div>
          </div>
          <div class="form-group col-md-4">
            <label for="cellphone">Celular</label>
            <input
              type="text"
              :class="['form-control', { 'is-invalid' : form.errors.has('cellphone')}]"
              id="cellphone"
              name="cellphone"
              v-model="form.cellphone"
              placeholder="Digite seu celular"
              required
            />
            <div
              class="invalid-feedback"
              v-if="form.errors.has('cellphone')"
              v-text="form.errors.first('cellphone')"
            ></div>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="state">Estado</label>
            <select id="state" class="form-control" v-model="state" required>
              <option value selected>Selecione...</option>
              <option v-for="state in states" :value="state.id">{{ state.name }}</option>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="city_id">Cidade</label>
            <select
              id="city_id"
              name="city_id"
              v-model="form.city_id"
              :class="['form-control', { 'is-invalid' : form.errors.has('city_id')}]"
              required
              :disabled="!cities.length"
            >
              <option value selected>Selecione...</option>
              <option v-for="city in cities" :value="city.id">{{ city.name }}</option>
            </select>
            <div class="invalid-feedback" v-text="form.errors.first('city_id')"></div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary" :disabled="form.errors.any()">Salvar</button>
      </form>
    </div>
  </section>
</template>

<script>
import Form from "form-backend-validation";

export default {
  data() {
    return {
      form: new Form({
        name: "",
        email: "",
        cellphone: "",
        city_id: ""
      }),
      message: "",
      messageClass: "",
      state: "",
      cities: []
    };
  },

  props: ["method", "action", "states"],

  watch: {
    state: function(val) {
      this.cities = [];

      if (val) {
        axios
          .get("/state/" + val + "/cities")
          .then(response => {
            this.cities = response.data;
          })
          .catch(e => {
            console.log("There was an error: " + e);
          });
      }
    }
  },

  methods: {
    onSubmit() {
      this.form[this.method](this.action)
        .then(response => {
          this.state = "";
          this.displaySuccessMessage("Cadastro realizado com sucesso!");
        })
        .catch(response => this.displayErrorMessage("Cadastro não efetuado!"));
    },

    displaySuccessMessage(message) {
      this.messageClass = "alert-success";
      this.message = message;
    },

    displayErrorMessage(message) {
      this.messageClass = "alert-danger";
      this.message = message;
    },

    clearMessage() {
      this.message = "";
    }
  }
};
</script>
