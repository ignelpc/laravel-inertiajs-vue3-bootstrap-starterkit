
<template>
  <Head title="Tasks" />
  <BaseLayout>
    <template v-slot:title>Tasks</template>
    <template v-slot:rightActions>
      <Link href="/tasks/create" class="btn btn-sm btn-primary float-right">
        <i class="fa fa-plus"></i> New</Link
      >
    </template>
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-sm-6">Itens per page...</div>
          <div class="col-sm-6">
            <div class="float-right">Filtros</div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-sm-12">
            <table class="table table-striped table-hover table-borderless">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Created at</th>
                  <th>Options</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="task in tasks.data" :key="task.id">
                  <td>{{ task.title }}</td>
                  <td>{{ task.description }}</td>
                  <td>{{ formatDate(task.created_at) }}</td>
                  <td>
                    <button
                      @click.prevent="edit(task.id)"
                      class="btn btn-sm btn-warning mr-2"
                    >
                      <i class="fa fa-edit"></i>
                    </button>
                    <button
                      @click.prevent="deleteTask(task)"
                      class="btn btn-sm btn-danger"
                      data-toggle="modal"
                      data-target="#modal-delete"
                    >
                      <i class="fa fa-trash"></i>
                    </button>
                  </td>
                </tr>
                <tr v-show="tasks.lenght <= 0">
                  <td>No task found!</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="text-center">
      <template v-for="link in tasks.links" :key="link.url">
        <Link
          class="mr-1"
          :class="link.url ? 'btn ' : 'btn btn-primary'"
          v-if="link.url"
          :href="link.url"
          v-html="link.label"
        />
        <span v-else v-html="link.label"></span>
      </template>
    </div>
    <div class="modal fade" id="modal-delete">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Delete Task</h4>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>
              Are you sure you want to delete the task
              <span class="text-bold">{{ task?.title }}</span
              >?
            </p>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal">
              Cancel
            </button>
            <button
              type="button"
              @click="submitDeleteTask()"
              :disabled="isLoading"
              class="btn btn-success"
              data-dismiss="modal"
            >
              Delete
            </button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
  </BaseLayout>
</template>
<script>
import BaseLayout from "../../Layouts/BaseLayout.vue";

export default {
  name: "Home",
  components: { BaseLayout },
  props: { tasks: Object },
  data: () => {
    return {
      task: null,
      isLoading: false,
    };
  },
  methods: {
    formatDate(date) {
      return new Date(date).toLocaleDateString("en-CA");
    },
    edit(id) {
      this.$inertia.get(`/tasks/${id}/edit`);
    },
    deleteTask(task) {
      this.task = task;
    },
    submitDeleteTask() {
      this.isLoading = true;
      this.$inertia.delete(`/tasks/${this.task.id}`, {
        preserveState: true,
        preserveScroll: true,
        onSuccess: () => {
          this.isLoading = false;
        },
      });
    },
  },
};
</script>
