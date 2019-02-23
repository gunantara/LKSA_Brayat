<template>
  <div class="container">
    <div class="row mt-2" v-if="$gate.isAdmin()">
      <div class="col md-16">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-user-tie"></i>
              Data Karyawan
            </h3>

            <div class="card-tools">
              <button class="btn btn-success" @click="newModal()">
                Add New
                <i class="fa fa-user-plus"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover">
              <tbody>
                <tr>
                  <th>Nama</th>
                  <th>NIK</th>
                  <th>Kelamin</th>
                  <th>Tempat / Tanggal Lahir</th>
                  <th>Jabatan</th>
                  <th>Status Kepegawaian</th>
                  <th>Pendidikan Terakhir</th>
                  <th>Pernah Mengikuti Pelatihan</th>
                  <th>Modify</th>
                </tr>
                <tr v-for="employee in employees" :key="employee.id">
                  <td>{{employee.Nama_lengkap | Uptext}}</td>
                  <td>{{employee.NIK | Uptext}}</td>
                  <td>{{employee.Jenis_Kelamin | Uptext}}</td>
                  <td>{{employee.Tempat_lahir | Uptext}} , {{employee.Tgl_lahir | myDate}}</td>
                  <td>{{employee.Jabatan | Uptext}}</td>
                  <td>{{employee.Status_Kepegawaian | Uptext}}</td>
                  <td>{{employee.Pendidikan_Terakhir | Uptext}}</td>
                  <td>{{employee.Pelatihan_yg_diikuti | Uptext}}</td>
                  <td>
                    <button
                      type="button"
                      class="btn btn-primary btn-sm"
                      @click="editModal(employee)"
                    >
                      <i class="fa fa-edit"></i>
                    </button>
                    <button
                      type="button"
                      class="btn btn-danger btn-sm"
                      @click="deletekaryawan(employee.id)"
                    >
                      <i class="fa fa-trash"></i>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="addNew"
      tabindex="-1"
      role="dialog"
      aria-labelledby="addNewLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 v-show="!editmode" class="modal-title" id="addNewLabel">Add New Karyawan</h5>
            <h5 v-show="editmode" class="modal-title" id="addNewLabel">Edit User Karyawan Info</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="editmode ? updateUser() :createUser()">
            <div class="modal-body">
              <div class="form-group">
                <date-picker v-model="date" :config="options"></date-picker>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button v-show="editmode" type="submit" class="btn btn-success">Update</button>
              <button v-show="!editmode" type="submit" class="btn btn-primary">Create</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
export default {
  data() {
    return {
      date: new Date(),
      options: {
        format: "DD/MM/YYYY",
        useCurrent: false
      },
      editmode: false,
      employees: {}
    };
  },

  mounted() {
    this.$store.dispatch("allEmployee");
  },
  computed: {
    getEmployee() {
      return this.$store.getters.getEmployee;
    }
  },
  methods: {
    loadKaryawan() {
      if (this.$gate.isAdmin()) {
        axios
          .get("api/employee")
          .then(({ data }) => (this.employees = data.employees));
      }
    },
    newModal() {
      this.editmode = false;
      //this.form.reset();
      $("#addNew").modal("show");
    },
    editModal(user) {
      this.editmode = true;
      //this.form.reset();
      $("#addNew").modal("show");
      this.form.fill(user);
    }
  },
  created() {
    this.loadKaryawan();
    Fire.$on("AfterCreated", () => {
      this.loadKaryawan();
    });
  }
};
</script>
