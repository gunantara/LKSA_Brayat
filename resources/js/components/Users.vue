<template>
  <section class="content">
    <div class="container-fluid">
      <div class="row mt-3" v-if="$gate.isAdmin()">
        <!-- Widget Jumlah Pengguna -->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{getJumlahUser}}</h3>
              <p>Jumlah Pengguna</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-tie"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-0" v-if="$gate.isAdmin()">
        <!-- Tabel Pengguna -->
        <div class="col md-12">
          <div class="card card-info card-outline">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-users"></i>
                Data Pengguna
              </h3>
              <div class="card-tools">
                <button class="btn btn-primary" @click="newModal()">
                  Tambah Baru
                  <i class="fa fa-user-plus"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Ditambahkan pada</th>
                    <th>Ubah/Hapus</th>
                  </tr>
                  <tr v-for="user in users" :key="user.id">
                    <td>{{user.id}}</td>
                    <td>{{user.name | Uptext}}</td>
                    <td>{{user.email}}</td>
                    <td>{{user.type | Uptext}}</td>
                    <td>{{user.created_at | myDate}}</td>
                    <td>
                      <button type="button" class="btn btn-success btn-sm" @click="editModal(user)">
                        <i class="fa fa-edit"></i>
                      </button>
                      <button
                        type="button"
                        class="btn btn-danger btn-sm"
                        @click="deleteUser(user.id)"
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
              <h5 v-show="!editmode" class="modal-title" id="addNewLabel">Add New User</h5>
              <h5 v-show="editmode" class="modal-title" id="addNewLabel">Edit User Profile Info</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form @submit.prevent="editmode ? updateUser() :createUser()">
              <div class="modal-body">
                <div class="form-row">
                  <div class="col">
                    <div class="form-group">
                      <label for="selectemployee">Pilih Karyawan</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="validationTooltipUsernamePrepend">
                            <i class="fas fa-user-tie"></i>
                          </span>
                        </div>
                        <select
                          name="id_employee"
                          v-model="form.id_employee"
                          id="id_employee"
                          class="form-control"
                          :class="{ 'is-invalid': form.errors.has('id_employee') }"
                        >
                          <option value disabled selected>Select Karyawan</option>
                          <option
                            :value="employees.id"
                            v-for="employees in getEmployee"
                            :key="employees.id"
                          >ID Karyawan {{employees.id}} --> {{employees.Nama_lengkap}}</option>
                        </select>
                        <has-error :form="form" field="id_employee"></has-error>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label for="selectrole">Pilih Role</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="validationTooltipUsernamePrepend">
                            <i class="fas fa-user-cog"></i>
                          </span>
                        </div>
                        <select
                          name="type"
                          v-model="form.type"
                          id="type"
                          class="form-control"
                          :class="{ 'is-invalid': form.errors.has('type') }"
                        >
                          <option value disabled selected>Select User Role</option>
                          <option value="admin">Admin</option>
                          <option value="Pengelola">Pengelola</option>
                          <option value="Kepala LKSA">Kepala LKSA</option>
                        </select>
                        <has-error :form="form" field="type"></has-error>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputnama">Username</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="validationTooltipUsernamePrepend">
                        <i class="fas fa-user"></i>
                      </span>
                    </div>
                    <input
                      v-model="form.name"
                      type="text"
                      name="name"
                      placeholder="Name"
                      class="form-control"
                      :class="{ 'is-invalid': form.errors.has('name') }"
                    >
                    <has-error :form="form" field="name"></has-error>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputemail">Email</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="validationTooltipUsernamePrepend">
                        <i class="fas fa-at"></i>
                      </span>
                    </div>
                    <input
                      v-model="form.email"
                      type="email"
                      name="email"
                      placeholder="Email"
                      class="form-control"
                      :class="{ 'is-invalid': form.errors.has('email') }"
                    >
                    <has-error :form="form" field="email"></has-error>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputbio">Bio</label>
                  <textarea
                    v-model="form.bio"
                    name="bio"
                    id="bio"
                    placeholder="bio of user(optional)"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('bio') }"
                  ></textarea>
                  <has-error :form="form" field="bio"></has-error>
                </div>
                <div class="form-group">
                  <label for="inoutpassword">Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="validationTooltipUsernamePrepend">
                        <i class="fas fa-key"></i>
                      </span>
                    </div>
                    <input
                      v-model="form.password"
                      type="password"
                      name="password"
                      id="password"
                      placeholder="password"
                      class="form-control"
                      :class="{ 'is-invalid': form.errors.has('password') }"
                    >
                    <has-error :form="form" field="password"></has-error>
                  </div>
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
  </section>
</template>
 
<script>
export default {
  //Object of data User
  data() {
    return {
      editmode: false,
      users: {},
      form: new Form({
        id_employee: "",
        id: "",
        name: "",
        email: "",
        password: "",
        type: "",
        bio: "",
        photo: ""
      })
    };
  },
  mounted() {
    this.$store.dispatch("allEmployee");
    this.$store.dispatch("AllJumlah_Users");
  },
  computed: {
    getEmployee() {
      return this.$store.getters.getEmployee;
    },
    getJumlahUser() {
      return this.$store.getters.getJumlahUser;
    }
  },
  methods: {
    loadUser() {
      if (this.$gate.isAdmin()) {
        axios.get("api/user").then(({ data }) => (this.users = data));
        this.$store.dispatch("allEmployee");
      }
    },
    loadJumlah() {
      if (this.$gate.isAdmin()) {
        this.$store.dispatch("AllJumlah_Users");
      }
    },
    getResults(page = 1) {
      axios.get("api/user?page=" + page).then(response => {
        this.users = response.data;
      });
    },
    updateUser() {
      //console.log("Editing Data");
      this.$Progress.start();
      this.form
        .put("api/user/" + this.form.id)
        .then(() => {
          $("#addNew").modal("hide");
          swal.fire("Updated!", "Your file has been Updated.", "success");
          Fire.$emit("AfterCreated");
          this.$Progress.finish();
        })
        .catch(() => {
          swal.fire("Fail!", "Something Wrong", "warning");
          this.$Progress.fail();
        });
    },
    newModal() {
      this.editmode = false;
      this.form.reset();
      $("#addNew").modal("show");
    },
    editModal(user) {
      this.editmode = true;
      this.form.reset();
      $("#addNew").modal("show");
      this.form.fill(user);
    },
    deleteUser(id) {
      swal
        .fire({
          title: "Anda yakin Menghapus Data ini?",
          text: "You won't be able to revert this!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!"
        })
        .then(result => {
          //send request to the server
          if (result.value) {
            this.form
              .delete("api/user/" + id)
              .then(() => {
                swal.fire("Deleted!", "Your file has been deleted.", "success");
                Fire.$emit("AfterCreated");
              })
              .catch(() => {
                swal.fire("Fail!", "Something Wrong", "warning");
              });
          }
        });
    },
    createUser() {
      this.$Progress.start();
      this.form
        .post("api/user")
        .then(() => {
          Fire.$emit("AfterCreated");
          $("#addNew").modal("hide");
          toast.fire({
            type: "success",
            title: "User created successfully"
          });
          this.$Progress.finish();
        })
        .catch(() => {
          toast.fire({
            type: "error",
            title: "Something wrong"
          });
        });
    }
  },
  created() {
    this.loadUser();
    this.loadJumlah();
    Fire.$on("AfterCreated", () => {
      this.loadUser();
      this.loadJumlah();
    });
    //setInterval(() =>  this.loadUser(), 3000);
    //console.log("Component mounted.");
  }
};
</script>
