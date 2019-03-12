<template>
  <section class="content">
    <div class="container-fluid">
      <div class="row mt-3">
        <div class="col-md-4">
          <!-- Profile of Child Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img
                  class="profile-user-img img-fluid img-circle"
                  :src="getProfilePhoto()"
                  alt="User profile picture"
                >
              </div>
              <h3 class="profile-username text-center">{{this.form.Nama_Lengkap}}</h3>
              <p class="text-muted text-center">Nomor Induk : {{this.form.No_induk}}</p>
              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Tempat Lahir</b>
                  <a class="float-right">{{this.form.Tempat_lahir | Uptext}}</a>
                </li>
                <li class="list-group-item">
                  <b>Tanggal Lahir</b>
                  <a class="float-right">{{this.form.Tgl_lahir | myDate}}</a>
                </li>
                <li class="list-group-item">
                  <b>Agama</b>
                  <a class="float-right">{{this.form.Agama | Uptext}}</a>
                </li>
                <li class="list-group-item">
                  <b>Masuk Panti Asuhan</b>
                  <a class="float-right">{{this.form.Tgl_masuk_PA | myDate}}</a>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <!-- Tentang Anak Box -->
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Tentang Anak</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <strong>
                <i class="fas fa-map mr-1"></i> Alamat Anak
              </strong>
              <p class="text-muted">{{this.form.Alamat | Uptext}}</p>
              <hr>
              <strong>
                <i class="fas fa-school mr-1"></i>
                <span>Sekolah</span>
              </strong>
              <p class="text-muted">
                <b>Tanggal Mulai Sekolah :</b>
                <span class="float-right">{{this.form.Mulai_masuk_sekolah | myDate}}</span>
                <br>
                <b>Nama Sekolah :</b>
                <span class="float-right">{{this.form.Nama_sekolah | Uptext}}</span>
                <br>
                <b>Kelas :</b>
                <span class="float-right">{{this.form.Kelas | Uptext}}</span>
              </p>
              <hr>
              <strong>
                <i class="fa fa-map-marker mr-1"></i> Sebab masuk Panti Asuhan
              </strong>
              <p class="text-muted">{{this.form.Sebab_masuk_PA | Uptext}}</p>
              <hr>
              <strong>
                <i class="fas fa-file-alt"></i> Keterangan Anak
              </strong>
              <p class="text-muted">{{this.form.Keterangan_anak | Uptext}}</p>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-8">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item">
                  <a class="nav-link active" href="#Data_Detail_Ayah" data-toggle="tab">Detail Ayah</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#Data_Detail_Ibu" data-toggle="tab">Detail Ibu</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#Data_Permasalahan" data-toggle="tab">Masalah Anak</a>
                </li>
              </ul>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <!-- /.tab-pane -->
                <div class="active tab-pane" id="Data_Detail_Ayah">
                  <!-- The timeline -->
                  <ul class="timeline timeline-inverse">
                    <!-- timeline time label -->
                    <li class="time-label">
                      <span class="bg-success">Diupdate : {{this.form.updated_at | myDate}}</span>
                    </li>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <li>
                      <i class="fa fa-user bg-primary"></i>
                      <div class="timeline-item">
                        <h3 class="timeline-header">
                          <strong>Nama Lengkap</strong>
                        </h3>
                        <div class="timeline-body">{{this.form.Nama_Ayah | Uptext}}</div>
                      </div>
                    </li>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <li>
                      <i class="fa fa-map bg-primary"></i>
                      <div class="timeline-item">
                        <h3 class="timeline-header">
                          <strong>Alamat</strong>
                        </h3>
                        <div class="timeline-body">{{this.form.Alamat_Ayah | Uptext}}</div>
                      </div>
                    </li>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <li>
                      <i class="fa fa-church bg-danger"></i>
                      <div class="timeline-item">
                        <h3 class="timeline-header">
                          <strong>Agama</strong>
                        </h3>
                        <div class="timeline-body">{{this.form.Agama_Ayah | Uptext}}</div>
                      </div>
                    </li>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    <li>
                      <i class="fa fa-user-graduate bg-info"></i>
                      <div class="timeline-item">
                        <h3 class="timeline-header">
                          <strong>Pendidikan Terakhir</strong>
                        </h3>
                        <div class="timeline-body">{{this.form.Pendidikan_Ayah| Uptext}}</div>
                      </div>
                    </li>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    <li>
                      <i class="fa fa-briefcase bg-warning"></i>
                      <div class="timeline-item">
                        <h3 class="timeline-header">
                          <strong>Pekerjaan Ayah</strong>
                        </h3>
                        <div class="timeline-body">{{this.form.Pekerjaan_Ayah| Uptext}}</div>
                      </div>
                    </li>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    <li>
                      <i class="fa bg-success">Rp.</i>
                      <div class="timeline-item">
                        <h3 class="timeline-header">Penghasilan Ayah</h3>

                        <div class="timeline-body">
                          <div class="timeline-body">{{this.form.Penghasilan_Ayah| Uptext}}/perbulan</div>
                        </div>
                      </div>
                    </li>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    <li>
                      <i class="fa fa-child bg-primary"></i>
                      <div class="timeline-item">
                        <h3 class="timeline-header">Tanggungan Anak</h3>

                        <div class="timeline-body">
                          <div class="timeline-body">{{this.form.Tanggungan| Uptext}}</div>
                        </div>
                      </div>
                    </li>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    <li>
                      <i class="fa fa-home bg-success"></i>
                      <div class="timeline-item">
                        <h3 class="timeline-header">Perumahan</h3>

                        <div class="timeline-body">
                          <div class="timeline-body">{{this.form.Perumahan| Uptext}}</div>
                        </div>
                      </div>
                    </li>
                    <!-- END timeline item -->
                    <li>
                      <i class="fa fa-clock-o bg-gray"></i>
                    </li>
                  </ul>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="Data_Detail_Ibu">
                  <!-- The timeline -->
                  <ul class="timeline timeline-inverse">
                    <!-- timeline time label -->
                    <li class="time-label">
                      <span class="bg-success">Diupdate : {{this.form.updated_at | myDate}}</span>
                    </li>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <li>
                      <i class="fa fa-user bg-primary"></i>
                      <div class="timeline-item">
                        <h3 class="timeline-header">
                          <strong>Nama Lengkap</strong>
                        </h3>
                        <div class="timeline-body">{{this.form.Nama_Ibu | Uptext}}</div>
                      </div>
                    </li>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    <li>
                      <i class="fa fa-map bg-primary"></i>
                      <div class="timeline-item">
                        <h3 class="timeline-header">
                          <strong>Alamat</strong>
                        </h3>
                        <div class="timeline-body">{{this.form.Alamat_Ibu | Uptext}}</div>
                      </div>
                    </li>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <li>
                      <i class="fa fa-church bg-danger"></i>
                      <div class="timeline-item">
                        <h3 class="timeline-header">
                          <strong>Agama</strong>
                        </h3>
                        <div class="timeline-body">{{this.form.Agama_Ibu | Uptext}}</div>
                      </div>
                    </li>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    <li>
                      <i class="fa fa-user-graduate bg-info"></i>
                      <div class="timeline-item">
                        <h3 class="timeline-header">
                          <strong>Pendidikan Terakhir</strong>
                        </h3>
                        <div class="timeline-body">{{this.form.Pendidikan_Ibu| Uptext}}</div>
                      </div>
                    </li>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    <li>
                      <i class="fa fa-briefcase bg-warning"></i>
                      <div class="timeline-item">
                        <h3 class="timeline-header">
                          <strong>Pekerjaan Ibu</strong>
                        </h3>
                        <div class="timeline-body">{{this.form.Pekerjaan_Ibu| Uptext}}</div>
                      </div>
                    </li>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    <li>
                      <i class="fa bg-success">Rp.</i>
                      <div class="timeline-item">
                        <h3 class="timeline-header">Penghasilan Ibu</h3>

                        <div class="timeline-body">
                          <div class="timeline-body">{{this.form.Penghasilan_Ibu| Uptext}}/perbulan</div>
                        </div>
                      </div>
                    </li>
                    <!-- END timeline item -->
                    <li>
                      <i class="fa fa-clock-o bg-gray"></i>
                    </li>
                  </ul>
                </div>
                <!-- /.tab-pane -->
                <!-- /.tab-pane -->
                <div class="tab-pane" id="Data_Permasalahan">
                  <!-- The timeline -->
                  <ul class="timeline timeline-inverse">
                    <!-- timeline time label -->
                    <li class="time-label">
                      <span class="bg-success">Diupdate : {{this.form.updated_at | myDate}}</span>
                    </li>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <li>
                      <i class="fa fa-map-pin bg-danger"></i>
                      <div class="timeline-item">
                        <h3 class="timeline-header">
                          <strong>Latar Belakang Permasalahan Anak</strong>
                        </h3>
                        <div
                          class="timeline-body"
                        >{{this.form.Latar_Belakang_Permasalahan | Uptext}}</div>
                      </div>
                    </li>
                    <!-- /.timeline-label -->
                    <li>
                      <i class="fa fa-map-pin bg-danger"></i>
                      <div class="timeline-item">
                        <h3 class="timeline-header">
                          <strong>Alasan Menitipkan Anak di Panti</strong>
                        </h3>
                        <div class="timeline-body">{{this.form.Alasan_yg_menitipkan| Uptext}}</div>
                      </div>
                    </li>
                    <!-- /.timeline-label -->
                    <li>
                      <i class="fa fa-clock-o bg-gray"></i>
                    </li>
                  </ul>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
</template>


<script>
export default {
  data() {
    return {
      userauth: new Form({
        id: "",
        name: ""
      }),
      children: {},
      form: new Form({
        //Detail Anak
        id: "",
        id_user: "",
        No_induk: "",
        Nama_Lengkap: "",
        Agama: "",
        Tempat_lahir: "",
        Tgl_lahir: new Date(),
        Surat_Kelahiran_Akta: "",
        Alamat: "",
        Mulai_masuk_sekolah: new Date(),
        Nama_sekolah: "",
        Kelas: "",
        Tgl_masuk_PA: new Date(),
        Administrasi_sekolah: "",
        Sebab_masuk_PA: "",
        Keterangan_anak: "",
        Nama_Wali: "",
        Nomor_telp_wali: "",
        Photo_anak: "",
        updated_at: "",

        // Detail Ortu
        id_children: "",
        Nama_Ayah: "",
        Alamat_Ayah: "",
        Agama_Ayah: "",
        Status_Ayah: "",
        Pendidikan_Ayah: "",
        Pekerjaan_Ayah: "",
        Penghasilan_Ayah: "",
        Nama_Ibu: "",
        Alamat_Ibu: "",
        Agama_Ibu: "",
        Status_Ibu: "",
        Pendidikan_Ibu: "",
        Pekerjaan_Ibu: "",
        Penghasilan_Ibu: "",
        Tanggungan: "",
        Perumahan: "",
        Latar_Belakang_Permasalahan: "",
        Alamat_yg_menitipkan: "",
        Alasan_yg_menitipkan: ""
      }),
      options: {
        format: "YYYY/MM/DD",
        useCurrent: false
      }
    };
  },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    getProfilePhoto() {
      let photo =
        this.form.Photo_anak.length > 200
          ? this.form.Photo_anak
          : "img/photo_anak/" + this.form.Photo_anak;
      return photo;
    },
    updateProfile(e) {
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
        this.form.Photo_anak = reader.result;
      };
      reader.readAsDataURL(file);
    }
  },
  created() {
    axios.get(`api/edit-anak/${this.$route.params.idanak}`).then(response => {
      this.form.fill(response.data.children[0]);
    });
  }
};
</script>
