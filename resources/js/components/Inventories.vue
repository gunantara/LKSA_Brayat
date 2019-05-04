<template>
  <section class="content">
    <div class="container-fluid">
      <div class="row mt-3">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Inventaris</h3>
              <div class="card-tools">
                <button class="btn btn-primary" @click="newModal()">
                  Tambah Baru
                  <i class="fas fa-plus"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <th>Nama Barang</th>
                    <th style="width: 10px">Jumlah</th>
                    <th>Bantuan Dari</th>
                    <th>Manfaat</th>
                    <th>Kepemilikan</th>
                    <th style="width: 10px">Kondisi</th>
                    <th>Ubah/Hapus</th>
                  </tr>
                  <tr v-for="inventori in inventories" :key="inventori.id">
                    <td>{{inventori.Nama_Fasilitas | Uptext}}</td>
                    <td>{{inventori.Jumlah}}</td>
                    <td>{{inventori.Bantuan | Uptext}}</td>
                    <td>{{inventori.Manfaat | Uptext}}</td>
                    <td>{{inventori.Kepemilikan | Uptext}}</td>
                    <td>
                      <span
                        v-if="inventori.Kondisi <= 100 && inventori.Kondisi >= 80 "
                        class="badge bg-success"
                      >{{inventori.Kondisi}}%</span>
                      <span
                        v-else-if="inventori.Kondisi <= 79 && inventori.Kondisi >= 60 "
                        class="badge bg-primary"
                      >{{inventori.Kondisi}}%</span>
                      <span
                        v-else-if="inventori.Kondisi <= 59 && inventori.Kondisi >= 35 "
                        class="badge bg-warning"
                      >{{inventori.Kondisi}}%</span>
                      <span v-else class="badge bg-danger">{{inventori.Kondisi}}%</span>
                    </td>
                    <td>
                      <button
                        type="button"
                        class="btn btn-success btn-sm"
                        @click="editModal(inventori)"
                      >
                        <i class="fa fa-edit"></i>
                      </button>
                      <button
                        type="button"
                        class="btn btn-danger btn-sm"
                        @click="deleteInventories(inventori.id)"
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
                <h5 v-show="!editmode" class="modal-title" id="addNewLabel">Tambah Inventaris</h5>
                <h5 v-show="editmode" class="modal-title" id="addNewLabel">Ubah Inventaris</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form @submit.prevent="editmode ? updateInventories() :createInventories()">
                <div class="modal-body">
                  <div class="form-row">
                    <div class="col">
                      <div class="form-group">
                        <label for="inputNamaFasilitas">Nama Fasilitas</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="validationTooltipNamaFasilitas">
                              <i class="fas fa-warehouse"></i>
                            </span>
                          </div>
                          <input
                            v-model="form.Nama_Fasilitas"
                            type="text"
                            name="Nama_Fasilitas"
                            placeholder="Nama Fasilitas"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('Nama_Fasilitas') }"
                          >
                          <has-error :form="form" field="Nama_Fasilitas"></has-error>
                        </div>
                      </div>
                    </div>
                    <div class="col-2">
                      <label for="inputJumlahFasilitas">Jumlah (Qnt)</label>
                      <input
                        v-model="form.Jumlah"
                        type="number"
                        name="Jumlah_Fasilitas"
                        min="1"
                        max="100"
                        step="2"
                        placeholder="1"
                        class="form-control"
                        :class="{ 'is-invalid': form.errors.has('Jumlah_Fasilitas') }"
                      >
                      <has-error :form="form" field="Jumlah_Fasilitas"></has-error>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col">
                      <div class="form-group">
                        <label for="inputNamaFasilitas">Kepemilikan</label>
                        <div class="input-group">
                          <input
                            v-model="form.Kepemilikan"
                            type="text"
                            name="Kepemilikan"
                            placeholder="Kepemilikan"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('Kepemilikan') }"
                          >
                          <has-error :form="form" field="Kepemilikan"></has-error>
                        </div>
                      </div>
                    </div>
                    <div class="col-2">
                      <label for="inputJumlahFasilitas">Kondisi (%)</label>
                      <input
                        v-model="form.Kondisi"
                        type="number"
                        name="Kondisi_Fasilitas"
                        min="1"
                        max="100"
                        step="2"
                        placeholder="1"
                        class="form-control"
                        :class="{ 'is-invalid': form.errors.has('Kondisi_Fasilitas') }"
                      >
                      <has-error :form="form" field="Kondisi_Fasilitas"></has-error>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col">
                      <div class="form-group">
                        <label for="inputBantuan">Bantuan dari</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="validationTooltipBantuan">
                              <i class="fas fa-hand-holding-heart"></i>
                            </span>
                          </div>
                          <input
                            v-model="form.Bantuan"
                            type="text"
                            name="Bantuan"
                            placeholder="Bantuan"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('Bantuan') }"
                          >
                          <has-error :form="form" field="Bantuan"></has-error>
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="inputBantuan">Manfaat</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="validationTooltipManfaat">
                              <i class="fas fa-warehouse"></i>
                            </span>
                          </div>
                          <input
                            v-model="form.Manfaat"
                            type="text"
                            name="Manfaat"
                            placeholder="Manfaat"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('Manfaat') }"
                          >
                          <has-error :form="form" field="Manfaat"></has-error>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                  <button v-show="editmode" type="submit" class="btn btn-success">Ubah</button>
                  <button v-show="!editmode" type="submit" class="btn btn-primary">Tambah</button>
                </div>
              </form>
            </div>
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
      inventories: {},
      userauth: new Form({
        id: "",
        name: ""
      }),
      form: new Form({
        id: "",
        id_user: "",
        Nama_Fasilitas: "",
        Jumlah: "",
        Bantuan: "",
        Manfaat: "",
        Kepemilikan: "",
        Kondisi: ""
      })
    };
  },
  mounted() {
    console.log("Component mounted.");
  },
  created() {
    this.LoadInvetories();
    this.loaduserAuth();
    Fire.$on("AfterCreated", () => {
      this.LoadInvetories();
      this.loaduserAuth();
    });
  },
  methods: {
    LoadInvetories() {
      if (this.$gate.isAdmin()) {
        axios
          .get("api/inventorie")
          .then(({ data }) => (this.inventories = data.inventorie));
      }
    },
    loaduserAuth() {
      axios.get("api/profile").then(({ data }) => this.userauth.fill(data));
    },
    newModal() {
      this.editmode = false;
      this.form.reset();
      $("#addNew").modal("show");
    },
    editModal(inventori) {
      this.editmode = true;
      this.form.reset();
      $("#addNew").modal("show");
      this.form.fill(inventori);
    },
    createInventories() {
      // store Children
      this.form.id_user = this.userauth.id;
      this.$Progress.start();
      this.form
        .post("api/inventorie")
        .then(() => {
          Fire.$emit("AfterCreated");
          $("#addNew").modal("hide");
          toast.fire({
            type: "success",
            title: "Data Inventaris berhasil ditambahkan"
          });
          this.$Progress.finish();
        })
        .catch(() => {
          toast.fire({
            type: "error",
            title: "Something wrong "
          });
        });
    },
    updateInventories() {
      //console.log("Editing Data");
      this.$Progress.start();
      this.form
        .put("api/inventorie/" + this.form.id)
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
    deleteInventories(id) {
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
              .delete("api/inventorie/" + id)
              .then(() => {
                swal.fire("Deleted!", "Your file has been deleted.", "success");
                Fire.$emit("AfterCreated");
              })
              .catch(() => {
                swal.fire("Fail!", "Something Wrong", "warning");
              });
          }
        });
    }
  }
};
</script>
