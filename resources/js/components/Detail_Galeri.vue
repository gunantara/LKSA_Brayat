<template>
  <section class="content">
    <div class="container-fluid">
      <div class="mt-3">
        <!-- Widget Jumlah Karyawan -->
        <div class="row mt-3">
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{jumlah_photo}}</h3>
                <p>Jumlah Foto</p>
              </div>
              <div class="icon">
                <i class="fas fa-image"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-0">
          <div class="col-md-12">
            <div class="card card-outline card-warning">
              <div class="card-header">
                <h3 class="card-title">Galeri</h3>
                <div class="card-tools">
                  <button class="btn btn-primary" @click="newModal()">
                    Tambah Foto
                    <i class="fa fa-plus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row mb-3">
                  <div
                    v-for="photo in list_photo"
                    :key="photo.id"
                    class="col-sm-3 panel panel-default"
                  >
                    <div class="panel-body">
                      <img class="img-fluid mb-1" :src="'img/galeri/'+photo.Photo" alt="Photo">
                      <div class="row mt-0">
                        <div class="col md-2">
                          <button
                            type="button"
                            class="btn btn-success btn-sm"
                            @click="editModal(photo)"
                          >
                            <i class="fa fa-edit"></i>
                          </button>
                          <button
                            type="button"
                            class="btn btn-danger btn-sm"
                            @click="deletePhoto(photo.id)"
                          >
                            <i class="fa fa-trash"></i>
                          </button>
                        </div>
                      </div>
                    </div>
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
          <div class="modal-dialog modal modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 v-show="!editmode" class="modal-title" id="addNewLabel">Tambah Foto Baru</h5>
                <h5 v-show="editmode" class="modal-title" id="addNewLabel">Edit Foto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form @submit.prevent="editmode ? updatePhoto() :createPhoto()">
                <div class="modal-body">
                  <div class="form-group">
                    <label for="photo" class="control-label">Foto Galeri</label>
                    <div class="card card-widget widget-user">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-header text-white">
                        <div class="text-center">
                          <div v-if="this.form.Photo === ''">
                            <img
                              class="col-md-6 img-fluid"
                              src="img/galeri/image.jpg"
                              alt="Foto Galeri"
                            >
                          </div>
                          <div v-else>
                            <img class="col-md-6 img-fluid" :src="getPhoto()" alt="Foto Galeri">
                          </div>
                        </div>
                      </div>
                      <input type="file" @change="updatePhoto" name="photo" class="form-input">
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
      jumlah_photo: {},
      list_photo: {},
      form: new Form({
        id: "",
        id_galeries: "",
        Photo: ""
      })
    };
  },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    getPhoto() {
      let photo =
        this.form.Photo.length > 200
          ? this.form.Photo
          : "img/galeri/" + this.form.Photo;
      return photo;
    },
    updatePhoto(e) {
      let file = e.target.files[0];
      let reader = new FileReader();
      let limit = 1024 * 1024 * 2;
      if (file["size"] > limit) {
        swal.fire({
          type: "error",
          title: "Oops...",
          text: "You are uploading a large file"
        });
        return false;
      }
      reader.onloadend = file => {
        this.form.Photo = reader.result;
      };
      reader.readAsDataURL(file);
    },
    loadListPhoto() {
      axios
        .get(`api/detail-galery/${this.$route.params.idgaleri}`)
        .then(({ data }) => (this.list_photo = data.list_photos));
    },
    loadJumlahPhoto() {
      axios
        .get(`api/detail-galery/${this.$route.params.idgaleri}`)
        .then(({ data }) => (this.jumlah_photo = data.jumlah_photos));
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
    },
    createPhoto() {
      this.form.id_galeries = this.$route.params.idgaleri;
      this.$Progress.start();
      this.form
        .post("api/detail_galeri")
        .then(() => {
          Fire.$emit("AfterCreated");
          $("#addNew").modal("hide");
          toast.fire({
            type: "success",
            title: "Photo berhasil ditambahkan"
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
    deletePhoto(id) {
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
              .delete("api/detail_galeri/" + id)
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
  },

  created() {
    this.loadListPhoto();
    this.loadJumlahPhoto();
    Fire.$on("AfterCreated", () => {
      this.loadListPhoto();
      this.loadJumlahPhoto();
    });
  }
};
</script>
