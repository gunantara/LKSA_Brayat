<template>
  <section class="content">
    <div class="container-fluid">
      <div class="mt-3">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title">Galeri</h3>

                <div class="card-tools">
                  <button class="btn btn-primary" @click="newModal()">
                    Tambah Galeri
                    <i class="fa fa-plus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div v-for="gal in galeri" :key="gal.id" class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                      <span class="info-box-icon bg-success">
                        <i class="fas fa-image"></i>
                      </span>
                      <div class="info-box-content">
                        <span class="info-box-text">{{gal.Kegiatan}}</span>

                        <button
                          type="button"
                          class="btn btn-success btn-sm"
                          @click="editModal(gal)"
                        >
                          <i class="fa fa-edit"></i>
                        </button>
                        <button
                          type="button"
                          class="btn btn-danger btn-sm"
                          @click="deleteGaleri(gal.id)"
                        >
                          <i class="fa fa-trash"></i>
                        </button>
                        <router-link :to="`detail-galery${gal.id}`">
                          <button type="button" class="btn btn-outline-warning btn-sm">Detail</button>
                        </router-link>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                  </div>
                </div>
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
                <h5 v-show="!editmode" class="modal-title" id="addNewLabel">Tambah Galeri</h5>
                <h5 v-show="editmode" class="modal-title" id="addNewLabel">Edit Nama Galeri</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form @submit.prevent="editmode ? updateGaleri() :createGaleri()">
                <div class="modal-body">
                  <div class="form-group">
                    <label for="inputnama">Nama Galeri</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="validationTooltipUsernamePrepend">
                          <i class="fas fa-image"></i>
                        </span>
                      </div>
                      <input
                        v-model="form.Kegiatan"
                        type="text"
                        name="kegiatan"
                        placeholder="Nama Galeri"
                        class="form-control"
                        :class="{ 'is-invalid': form.errors.has('kegiatan') }"
                      >
                      <has-error :form="form" field="kegiatan"></has-error>
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
  data() {
    return {
      editmode: false,
      userauth: new Form({
        id: "",
        name: ""
      }),
      galeri: {},
      form: new Form({
        id: "",
        id_user: "",
        Kegiatan: ""
      })
    };
  },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    loaduserAuth() {
      axios.get("api/profile").then(({ data }) => this.userauth.fill(data));
    },
    loadGaleri() {
      axios.get("api/galeri").then(({ data }) => (this.galeri = data.galeri));
    },
    newModal() {
      this.editmode = false;
      this.form.reset();
      $("#addNew").modal("show");
    },
    editModal(gal) {
      this.editmode = true;
      this.form.reset();
      $("#addNew").modal("show");
      this.form.fill(gal);
    },
    createGaleri() {
      this.form.id_user = this.userauth.id;
      this.$Progress.start();
      this.form
        .post("api/galeri")
        .then(() => {
          Fire.$emit("AfterCreated");
          $("#addNew").modal("hide");
          toast.fire({
            type: "success",
            title: "Galeri berhasil ditambahkan"
          });
          this.$Progress.finish();
        })
        .catch(() => {
          toast.fire({
            type: "error",
            title: "ada yang salah"
          });
        });
    },
    updateGaleri() {
      //console.log("Editing Data");
      this.$Progress.start();
      this.form
        .put("api/galeri/" + this.form.id)
        .then(() => {
          $("#addNew").modal("hide");
          swal.fire("Diubah!", "Nama Galeri berhasil diubah.", "success");
          Fire.$emit("AfterCreated");
          this.$Progress.finish();
        })
        .catch(() => {
          swal.fire("Gagal!", "Ada yang salah cek kembali form", "warning");
          this.$Progress.fail();
        });
    },
    deleteGaleri(id) {
      swal
        .fire({
          title: "Anda yakin Menghapus Galeri ini?",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Ya, Hapus!"
        })
        .then(result => {
          //send request to the server
          if (result.value) {
            this.form
              .delete("api/galeri/" + id)
              .then(() => {
                swal.fire("Terhapus!", "Galeri berhasil dihapus.", "success");
                Fire.$emit("AfterCreated");
              })
              .catch(() => {
                swal.fire("Gagal!", "Ada yang salah", "warning");
              });
          }
        });
    }
  },
  created() {
    this.loadGaleri();
    this.loaduserAuth();
    Fire.$on("AfterCreated", () => {
      this.loadGaleri();
      this.loaduserAuth();
    });
  }
};
</script>
