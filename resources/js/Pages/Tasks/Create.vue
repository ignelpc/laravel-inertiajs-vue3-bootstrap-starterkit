
<template>
  <Head title="Create Task" />
  <BaseLayout>
    <template v-slot:title>Create a new task</template>
    <template v-slot:rightActions>
      <Link href="/tasks" class="btn btn-sm btn-primary float-right">
        <i class="fa fa-arrow-left"></i> Back
      </Link>
    </template>

    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col s12">
            <form @submit.prevent="submit">
              <div class="col-sm-12 mb-3">
                <label for="title" class="form-label">Title</label>
                <input
                  type="text"
                  v-model="form.title"
                  name="title"
                  id="title"
                  placeholder="Title..."
                  class="form-control"
                  :class="{ 'is-invalid': errors.title }"
                />
                <span class="text-danger text-xs" v-show="errors.title">
                  {{ errors.title }}
                </span>
              </div>
              <div class="col-sm-12 mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea
                  type="text"
                  v-model="form.description"
                  name="description"
                  id="description"
                  placeholder="Description of the task..."
                  class="form-control"
                  :class="{ 'is-invalid': errors.description }"
                ></textarea>
                <span class="text-danger text-xs" v-show="errors.description">
                  {{ errors.description }}
                </span>
              </div>
              <div class="col-sm-12">
                <button class="btn btn-sm btn-success">Create</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </BaseLayout>
</template>
<script>
import BaseLayout from "../../Layouts/BaseLayout.vue";

export default {
  name: "Create",
  components: { BaseLayout },
  props: { errors: Object },
  data: () => {
    return {
      form: {
        title: "",
        description: "",
      },
    };
  },
  methods: {
    submit() {
      this.$inertia.post("/tasks", this.form);
    },
  },
};
</script>
