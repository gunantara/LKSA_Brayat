<template>
  <section class="content">
    <div class="container-fluid">
      <div class="row mt-3" v-if="$gate.isAdmin()">
        <!-- Widget Jumlah Karyawan -->
        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{getJumlahEmployee}}</h3>
              <p>Jumlah Karyawan</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-tie"></i>
            </div>
          </div>
        </div>
        <!-- Tabel Karyawan -->
        <div class="col md-12">
          <div class="card card-warning card-outline">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-user-tie"></i>
                Data Karyawan
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
                    <th>Nama Lengkap</th>
                    <th>NIK</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat/Tanggal Lahir</th>
                    <th>Jabatan</th>
                    <th>Status Kepegawaian</th>
                    <th>Mulai Bekerja</th>
                    <th>Pendidikan</th>
                    <th>Mengikuti Pelatihan</th>
                    <th>Ubah/Hapus</th>
                  </tr>
                  <tr v-for="employee in employees" :key="employee.id">
                    <td>{{employee.Nama_lengkap | Uptext}}</td>
                    <td>{{employee.NIK | Uptext}}</td>
                    <td>{{employee.Jenis_Kelamin | Uptext}}</td>
                    <td>{{employee.Tempat_lahir | Uptext}} , {{employee.Tgl_lahir | myDate}}</td>
                    <td>{{employee.Jabatan | Uptext}}</td>
                    <td>{{employee.Status_Kepegawaian | Uptext}}</td>
                    <td>{{employee.Mulai_Bekerja | myDate}}</td>
                    <td>{{employee.Pendidikan_Terakhir | Uptext}}</td>
                    <td>{{employee.Pelatihan_yg_diikuti | Uptext}}</td>
                    <td>
                      <button
                        type="button"
                        class="btn btn-success btn-sm"
                        @click="editModal(employee)"
                      >
                        <i class="fa fa-edit"></i>
                      </button>
                      <button
                        type="button"
                        class="btn btn-danger btn-sm"
                        @click="deleteEmployee(employee.id)"
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
            <form @submit.prevent="editmode ? updateEmploye() :createEmployee()">
              <div class="modal-body">
                <div class="form-group">
                  <label for="inputNama_lengkap">Nama Lengkap</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="validationTooltipUsernamePrepend">
                        <i class="fas fa-user-tie"></i>
                      </span>
                    </div>
                    <input
                      v-model="form.Nama_lengkap"
                      type="text"
                      name="Nama_lengkap"
                      placeholder="Nama Lengkap"
                      class="form-control"
                      :class="{ 'is-invalid': form.errors.has('Nama_Lengkap') }"
                    >
                    <has-error :form="form" field="Nama_Lengkap"></has-error>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col">
                    <div class="form-group">
                      <label for="inputNIK">NIK</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="validationTooltipUsernamePrepend">
                            <i class="fas fa-id-card"></i>
                          </span>
                        </div>
                        <input
                          v-model="form.NIK"
                          type="text"
                          name="NIK"
                          placeholder="NIK"
                          class="form-control"
                          :class="{ 'is-invalid': form.errors.has('NIK') }"
                        >
                        <has-error :form="form" field="NIK"></has-error>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label for="inputJenis_kelamin">Jenis Kelamin</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="validationTooltipUsernamePrepend">
                            <i class="fa fa-venus-mars"></i>
                          </span>
                        </div>
                        <select
                          v-model="form.Jenis_Kelamin"
                          type="text"
                          name="Jenis_Kelamin"
                          placeholder="Jenis Kelamin"
                          class="form-control"
                          :class="{ 'is-invalid': form.errors.has('Jenis_Kelamin') }"
                        >
                          <option value>Pilih Jenis Kelamin</option>
                          <option value="pria">Pria</option>
                          <option value="Wanita">Wanita</option>
                        </select>
                        <has-error :form="form" field="Jenis_Kelamin"></has-error>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col">
                    <div class="form-group">
                      <label for="inputtempatlahir">Tempat Lahir</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="validationTooltipUsernamePrepend">
                            <i class="fas fa-map"></i>
                          </span>
                        </div>
                        <input
                          v-model="form.Tempat_lahir"
                          type="text"
                          name="tempat_lahir"
                          placeholder="Tempat Lahir"
                          class="form-control"
                          :class="{ 'is-invalid': form.errors.has('tempat_lahir') }"
                        >
                        <has-error :form="form" field="tempat_lahir"></has-error>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label for="tgl_lahir">Tanggal Lahir</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fas fa-calendar-week"></i>
                          </span>
                        </div>
                        <date-picker v-model="form.Tgl_lahir" :config="options"></date-picker>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col">
                    <div class="form-group">
                      <label for="inputJabatan">Jabatan</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fas fa-id-card-alt"></i>
                          </span>
                        </div>
                        <input
                          v-model="form.Jabatan"
                          type="text"
                          name="Jabatan"
                          placeholder="Jabatan"
                          class="form-control"
                          :class="{ 'is-invalid': form.errors.has('Jabatan') }"
                        >
                        <has-error :form="form" field="Jabatan"></has-error>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label for="inputStatuspegawai">Status Kepegawaian</label>
                      <select
                        v-model="form.Status_Kepegawaian"
                        type="text"
                        name="Status_Kepegawaian"
                        placeholder="Status Kepegawaian"
                        class="form-control"
                        :class="{ 'is-invalid': form.errors.has('Status_Kepegawaian') }"
                      >
                        <option value>Status Kepegawaian</option>
                        <option value="Pegawai Tetap">Tetap</option>
                        <option value="Pegawai Honorer">Honorer</option>
                      </select>
                      <has-error :form="form" field="Status_Kepegawaian"></has-error>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label for="Mulai_Bekerja">Mulai Bekerja</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="validationTooltipUsernamePrepend">
                            <i class="fas fa-calendar-week"></i>
                          </span>
                        </div>
                        <date-picker v-model="form.Mulai_Bekerja" :config="options"></date-picker>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col">
                    <div class="form-group">
                      <label for="inputPendidikanTerakhir">Pendidikan Terakhir</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fas fa-graduation-cap"></i>
                          </span>
                        </div>
                        <select
                          v-model="form.Pendidikan_Terakhir"
                          type="text"
                          name="Pendidikan Terakhir"
                          placeholder="Pendidikan_Terakhir"
                          class="form-control"
                          :class="{ 'is-invalid': form.errors.has('Pendidikan_Terakhir') }"
                        >
                          <option value>Pendidikan Terakhir</option>
                          <option value="SMA">SMA</option>
                          <option value="Strata-1">Strata-1</option>
                          <option value="Strata-2">Strata-2</option>
                        </select>
                        <has-error :form="form" field="Pendidikan_Terakhir"></has-error>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label for="inpuPelatihan_yg_diikuti">Pelatihan yang diikuti</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fas fa-certificate"></i>
                          </span>
                        </div>
                        <input
                          v-model="form.Pelatihan_yg_diikuti"
                          type="text"
                          name="Pelatihan_yg_diikuti"
                          placeholder="Pelatihan yg diikuti"
                          class="form-control"
                          :class="{ 'is-invalid': form.errors.has('Pelatihan_yg_diikuti') }"
                        >
                        <has-error :form="form" field="Pelatihan_yg_diikuti"></has-error>
                      </div>
                    </div>
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
  data() {
    return {
      editmode: false,
      employees: {},
      form: new Form({
        id: "",
        Nama_lengkap: "",
        NIK: "",
        Jenis_Kelamin: "",
        Tempat_lahir: "",
        Tgl_lahir: new Date(),
        Mulai_Bekerja: new Date(),
        Jabatan: "",
        Status_Kepegawaian: "",
        Pendidikan_Terakhir: "",
        Pelatihan_yg_diikuti: ""
      }),
      date: new Date(),
      options: {
        format: "YYYY/MM/DD",
        useCurrent: false
      }
    };
  },

  mounted() {
    this.$store.dispatch("allEmployee");
    this.$store.dispatch("AllJumlah_Employees");
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
    loadJumlah() {
      if (this.$gate.isAdmin()) {
        this.$store.dispatch("AllJumlah_Employees");
      }
    },
    createEmployee() {
      this.$Progress.start();
      this.form
        .post("api/employee")
        .then(() => {
          Fire.$emit("AfterCreated");
          $("#addNew").modal("hide");
          toast.fire({
            type: "success",
            title: "Pegawai baru berhasil ditambahkan"
          });
          this.$Progress.finish();
        })
        .catch(() => {
          toast.fire({
            type: "error",
            title: "Something wrong"
          });
        });
    },
    updateEmploye() {
      //console.log("Editing Data");
      this.$Progress.start();
      this.form
        .put("api/employee/" + this.form.id)
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
    deleteEmployee(id) {
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
              .delete("api/employee/" + id)
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
    newModal() {
      this.editmode = false;
      this.form.reset();
      $("#addNew").modal("show");
    },
    editModal(employee) {
      this.editmode = true;
      this.form.reset();
      $("#addNew").modal("show");
      this.form.fill(employee);
    }
  },
  computed: {
    getJumlahEmployee() {
      return this.$store.getters.getJumlahEmployee;
    }
  },
  created() {
    this.loadJumlah();
    this.loadKaryawan();
    Fire.$on("AfterCreated", () => {
      this.loadKaryawan();
      this.loadJumlah();
    });
  }
};
</script>
