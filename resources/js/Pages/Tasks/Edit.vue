
<template>
  <Head title="Edit Task" />
  <BaseLayout>
    <template v-slot:title>Edit Task</template>

    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-sm-12">
            <form @submit.prevent="submit">
              <div class="col-sm-12 mb-3">
                <label for="name" class="form-label">Title</label>
                <input
                  type="text"
                  v-model="task.title"
                  name="name"
                  id="name"
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
                  v-model="task.description"
                  name="description"
                  id="description"
                  placeholder="Description"
                  class="form-control"
                  :class="{ 'is-invalid': errors.description }"
                ></textarea>
                <span class="text-danger text-xs" v-show="errors.description">
                  {{ errors.description }}
                </span>
              </div>
              <div class="col-sm-12">
                <button class="btn btn-sm btn-success">Update</button>
                <Link href="/tasks" class="btn btn-sm btn-danger float-right">
                  Cancel
                </Link>
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
  name: "Edit",
  components: { BaseLayout },
  props: { task: Object, errors: Object },
  data: () => {
    return {};
  },
  methods: {
    submit() {
      this.$inertia.put(`/tasks/${this.task.id}`, this.task, {
        preserveState: true,
      });
    },
  },
};
</script>
