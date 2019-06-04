<template>
  <section class="content">
    <div class="container-fluid">
      <div class="row mt-2">
        <div class="col md-12">
          <!-- general form elements -->

          <div class="card card-primary">
            <div class="card-header p-3">
              <h3 class="card-title">Pengaturan Profil LKSA</h3>
            </div>
            <!-- /.card-header -->
            <!-- Tab pick -->
            <div class="card">
              <div class="p-2">
                <ul class="nav nav-pills p-0">
                  <li class="nav-item card-success">
                    <a class="nav-link active show" href="#about" data-toggle="tab">Tentang Kami</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="#contact" data-toggle="tab">Kontak Kami</a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- Tab pick -->
            <!-- form start -->
            <form role="form">
              <div class="card-body">
                <div class="tab-content">
                  <!-- About Tab -->
                  <div class="tab-pane active show" id="about">
                    <div class="form-row">
                      <div class="col-3">
                        <div class="form-group">
                          <label for="photo" class="control-label">Logo LKSA</label>
                          <div class="card card-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header text-white">
                              <div class="text-center">
                                <div class="widget-user-image-anak">
                                  <img
                                    class="profile-user-img img-fluids"
                                    :src="getLogo()"
                                    alt="Logo"
                                  >
                                </div>
                              </div>
                            </div>
                            <input
                              type="file"
                              @change="updateLogo"
                              name="Logo_LKSA"
                              class="form-control"
                              :class="{ 'is-invalid': form.errors.has('Logo_LKSA') }"
                            >
                            <has-error :form="form" field="Logo_LKSA"></has-error>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="inputNama_LKSA">Nama LKSA</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="fas fa-building"></i>
                              </span>
                            </div>
                            <input
                              v-model="form.Nama_LKSA"
                              type="text"
                              name="Nama_LKSA"
                              placeholder="Nama LKSA"
                              class="form-control"
                              :class="{ 'is-invalid': form.errors.has('Nama_LKSA') }"
                            >
                            <has-error :form="form" field="Nama_LKSA"></has-error>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="col">
                        <div class="form-group">
                          <label for="inputAbout">Profil LKSA</label>
                          <textarea
                            v-model="form.Quote"
                            rows="11"
                            class="form-control"
                            type="text"
                            name="Quote"
                            placeholder="Profile LKSA ..."
                            :class="{ 'is-invalid': form.errors.has('Quote') }"
                          ></textarea>
                          <has-error :form="form" field="Quote"></has-error>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="form-group">
                          <label for="photo" class="control-label">Photo Profile LKSA</label>
                          <div class="card card-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header text-white">
                              <div class="text-center">
                                <div class="widget-user-image-anak">
                                  <img
                                    class="profile-user-img img-fluids"
                                    :src="getPhotoProfile()"
                                    alt="Logo"
                                  >
                                </div>
                              </div>
                            </div>
                            <input
                              type="file"
                              @change="updatePhotoProfile"
                              name="Photo_about"
                              class="form-control"
                              :class="{ 'is-invalid': form.errors.has('Photo_about') }"
                            >
                            <has-error :form="form" field="Photo_about"></has-error>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col-3">
                        <div class="form-group">
                          <label for="photo" class="control-label">Photo Kegiatan LKSA</label>
                          <div class="card card-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header text-white">
                              <div class="text-center">
                                <div class="widget-user-image-anak">
                                  <img
                                    class="profile-user-img img-fluids"
                                    :src="getPhotoKegiatan()"
                                    alt="Logo"
                                  >
                                </div>
                              </div>
                            </div>
                            <input
                              type="file"
                              @change="updatePhotoKegiatan"
                              name="Photo_kegiatan"
                              class="form-control"
                              :class="{ 'is-invalid': form.errors.has('Photo_kegiatan') }"
                            >
                            <has-error :form="form" field="Photo_kegiatan"></has-error>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="inputAbout">Profil Kegiatan</label>
                          <textarea
                            v-model="form.Profile_kegiatan"
                            rows="11"
                            class="form-control"
                            type="text"
                            name="Profile_kegiatan"
                            placeholder="Profile Kegiatan LKSA ..."
                            :class="{ 'is-invalid': form.errors.has('Profile_kegiatan') }"
                          ></textarea>
                          <has-error :form="form" field="Profile_kegiatan"></has-error>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col">
                        <div class="form-group">
                          <label for="inputAbout">Ucapan Terima Kasih</label>
                          <textarea
                            v-model="form.Profile"
                            rows="11"
                            class="form-control"
                            type="text"
                            name="Profile_kegiatan"
                            placeholder="Profile Kegiatan LKSA ..."
                            :class="{ 'is-invalid': form.errors.has('Profile_kegiatan') }"
                          ></textarea>
                          <has-error :form="form" field="Profile_kegiatan"></has-error>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="form-group">
                          <label for="photo" class="control-label">Photo Kunjungan</label>
                          <div class="card card-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header text-white">
                              <div class="text-center">
                                <div class="widget-user-image-anak">
                                  <img
                                    class="profile-user-img img-fluids"
                                    :src="getPhotoSumberDana()"
                                    alt="Logo"
                                  >
                                </div>
                              </div>
                            </div>
                            <input
                              type="file"
                              @change="updatePhotoSumberDana"
                              name="Photo_profiles"
                              class="form-control"
                              :class="{ 'is-invalid': form.errors.has('Photo_profiles') }"
                            >
                            <has-error :form="form" field="Photo_profiles"></has-error>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End About Tab -->

                  <!--  Contact Tab -->
                  <div class="tab-pane" id="contact">
                    <div class="form-row">
                      <div class="col">
                        <div class="form-group">
                          <label for="email" class="control-label">Email LKSA</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="fas fa-at"></i>
                              </span>
                            </div>
                            <input
                              type="text"
                              v-model="form.email"
                              name="email"
                              placeholder="email"
                              class="form-control"
                              :class="{'is-invalid': form.errors.has('email')}"
                            >
                            <has-error :form="form" field="email"></has-error>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <label for="email" class="control-label">Telepon LKSA</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="fas fa-phone"></i>
                            </span>
                          </div>
                          <input
                            type="text"
                            v-model="form.Telp"
                            name="Telp"
                            placeholder="Telepon LKSA"
                            class="form-control"
                            :class="{'is-invalid': form.errors.has('Telp')}"
                          >
                          <has-error :form="form" field="Telp"></has-error>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col">
                        <div class="form-group">
                          <label for="inputAbout">Alamat LKSA</label>
                          <textarea
                            v-model="form.Alamat"
                            rows="6"
                            class="form-control"
                            type="text"
                            name="Alamat"
                            placeholder="Alamat LKSA ..."
                            :class="{ 'is-invalid': form.errors.has('Alamat') }"
                          ></textarea>
                          <has-error :form="form" field="Alamat"></has-error>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="inputAbout">Rekening LKSA</label>
                          <textarea
                            v-model="form.No_Rekening"
                            rows="6"
                            class="form-control"
                            type="text"
                            name="No_Rekening"
                            placeholder="Nomor Rekening ..."
                            :class="{ 'is-invalid': form.errors.has('No_Rekening') }"
                          ></textarea>
                          <has-error :form="form" field="No_Rekening"></has-error>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--  End Contact Tab -->
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <router-link to="/profile-lksa">
                  <button
                    type="submit"
                    class="btn btn-success float-right"
                    @click="SimpanProfile()"
                  >Simpan Profile</button>
                </router-link>
              </div>
            </form>
          </div>
          <!-- /.card -->
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
      form: new Form({
        //About
        id: "",
        Logo_LKSA: "",
        Nama_LKSA: "",
        Photo_about: "",
        Title_about: "",
        Quote: "",

        //Profile
        Photo_profiles: "",
        Title_profile: "",
        Profile: "",

        //Kegiatan
        Photo_kegiatan: "",
        Title_kegiatan: "",
        Profile_kegiatan: "",

        //Kontak
        id: "",
        email: "",
        Telp: "",
        Alamat: "",
        No_Rekening: ""
      })
    };
  },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    getLogo() {
      let photo =
        this.form.Logo_LKSA.length > 200
          ? this.form.Logo_LKSA
          : "img/profile_lksa/" + this.form.Logo_LKSA;
      return photo;
    },
    getPhotoProfile() {
      let photo =
        this.form.Photo_about.length > 200
          ? this.form.Photo_about
          : "img/profile_lksa/" + this.form.Photo_about;
      return photo;
    },
    getPhotoKegiatan() {
      let photo =
        this.form.Photo_kegiatan.length > 200
          ? this.form.Photo_kegiatan
          : "img/profile_lksa/" + this.form.Photo_kegiatan;
      return photo;
    },
    getPhotoSumberDana() {
      let photo =
        this.form.Photo_profiles.length > 200
          ? this.form.Photo_profiles
          : "img/profile_lksa/" + this.form.Photo_profiles;
      return photo;
    },
    loaduserAuth() {
      axios.get("api/profile").then(({ data }) => this.userauth.fill(data));
    },
    updateLogo(e) {
      let file = e.target.files[0];
      let reader = new FileReader();
      let limit = 1024 * 1024 * 2;
      if (file["size"] > limit) {
        swal.fire({
          type: "error",
          title: "Oops...",
          text: "ukuran file terlalu besar"
        });
        return false;
      }
      reader.onloadend = file => {
        this.form.Logo_LKSA = reader.result;
      };
      reader.readAsDataURL(file);
    },
    updatePhotoProfile(e) {
      let file = e.target.files[0];
      let reader = new FileReader();
      let limit = 1024 * 1024 * 2;
      if (file["size"] > limit) {
        swal.fire({
          type: "error",
          title: "Oops...",
          text: "ukuran file terlalu besar"
        });
        return false;
      }
      reader.onloadend = file => {
        this.form.Photo_about = reader.result;
      };
      reader.readAsDataURL(file);
    },
    updatePhotoKegiatan(e) {
      let file = e.target.files[0];
      let reader = new FileReader();
      let limit = 1024 * 1024 * 2;
      if (file["size"] > limit) {
        swal.fire({
          type: "error",
          title: "Oops...",
          text: "ukuran file terlalu besar"
        });
        return false;
      }
      reader.onloadend = file => {
        this.form.Photo_kegiatan = reader.result;
      };
      reader.readAsDataURL(file);
    },
    updatePhotoSumberDana(e) {
      let file = e.target.files[0];
      let reader = new FileReader();
      let limit = 1024 * 1024 * 2;
      if (file["size"] > limit) {
        swal.fire({
          type: "error",
          title: "Oops...",
          text: "ukuran file terlalu besar"
        });
        return false;
      }
      reader.onloadend = file => {
        this.form.Photo_profiles = reader.result;
      };
      reader.readAsDataURL(file);
    },
    SimpanProfile() {
      this.$Progress.start();
      //profile
      this.form
        .put("api/profile_lksa/" + this.form.id)
        .then(() => {
          toast.fire({
            type: "success",
            title: "Data Profil berhasil diubah "
          });
          this.$Progress.finish();
        })
        .catch(() => {
          toast.fire({
            type: "error",
            title: "ada yang salah ketika mengubah profile"
          });
        });
    }
  },
  created() {
    this.loaduserAuth();
    //tampil profile
    axios.get("api/profile_lksa").then(response => {
      this.form.fill(response.data.about[0]);
    });
  }
};
</script>
