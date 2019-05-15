<template>
  <section class="content">
    <div class="container-fluid">
      <div class="row mt-3" v-if="$gate.isAdminOrUserOrKepala()">
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
                  <b>Umur</b>
                  <a class="float-right">{{this.form.Tgl_lahir | myAge}} Tahun</a>
                </li>
                <li class="list-group-item">
                  <b>Agama</b>
                  <a class="float-right">{{this.form.Agama | Uptext}}</a>
                </li>
                <li class="list-group-item">
                  <b>Masuk Panti Asuhan</b>
                  <a class="float-right">{{this.form.Tgl_masuk_PA | myDate}}</a>
                </li>
                <li class="list-group-item">
                  <b>Angkatan</b>
                  <a class="float-right">{{this.form.Tgl_masuk_PA | myYear}}</a>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <!-- Biodata Anak Box -->
          <div class="card card-warning card-outline">
            <div class="card-header">
              <h3 class="card-title">Biodata Anak</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <strong>
                <i class="fas fa-text-height mr-1"></i> Tinggi Badan
              </strong>
              <a class="float-right">{{this.form.Tinggi_Badan | Uptext}} Cm</a>
              <hr>
              <strong>
                <i class="fas fa-weight mr-1"></i>
                <span>Berat Badan</span>
              </strong>
              <a class="float-right">{{this.form.Berat_Badan | Uptext}} Kg</a>
              <hr>
              <strong>
                <i class="fa fa-tint mr-1"></i> Golongan Darah
              </strong>
              <p class="float-right">{{this.form.Golongan_Darah | Uptext}}</p>
              <hr>
              <strong>
                <i class="fas fa-map-pin mr-1"></i>
                <span>Alergi</span>
              </strong>
              <p class="text-muted">
                <b>Makanan :</b>
                <span class="float-right">{{this.form.Alergi_Makanan | Uptext}}</span>
                <br>
                <b>Minuman :</b>
                <span class="float-right">{{this.form.Alergi_Minuman| Uptext}}</span>
                <br>
                <b>Obat :</b>
                <span class="float-right">{{this.form.Alergi_Obat | Uptext}}</span>
              </p>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <!-- Tentang Anak Box -->
          <div class="card card-success card-outline">
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
                  <a class="nav-link" href="#Detail_Saudara_Anak" data-toggle="tab">Detail Saudara</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#Data_Permasalahan" data-toggle="tab">Masalah Anak</a>
                </li>
              </ul>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <!-- /.tab-pane Detail Ayah-->
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
                        <h3 class="timeline-header">
                          <strong>Penghasilan Ayah</strong>
                        </h3>
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
                        <h3 class="timeline-header">
                          <strong>Tanggungan Anak</strong>
                        </h3>

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
                        <h3 class="timeline-header">
                          <strong>Perumahan</strong>
                        </h3>
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
                <!-- /.tab-pane Detail Ibu-->
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
                        <h3 class="timeline-header">
                          <strong>Penghasilan Ibu</strong>
                        </h3>

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
                <!-- /.tab-pane Saudara Anak-->
                <div class="tab-pane" id="Detail_Saudara_Anak">
                  <!-- The timeline -->
                  <ul class="timeline timeline-inverse">
                    <!-- timeline time label -->
                    <li class="time-label">
                      <span class="bg-success">Diupdate : {{this.form.updated_at | myDate}}</span>
                    </li>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <li v-for="other_families in children_other_families" :key="other_families.id">
                      <i class="fa fa-user bg-warning"></i>
                      <div class="timeline-item">
                        <h3 class="timeline-header">
                          <strong>Keterangan : {{other_families.Keterangan |Uptext}}</strong>
                        </h3>
                        <div class="timeline-body">Nama : {{other_families.Nama| Uptext}}</div>
                        <div
                          class="timeline-body"
                        >Tanggal Lahir : {{other_families.Tgl_lahir| myDate}}</div>
                        <div class="timeline-body">Sekolah : {{other_families.Sekolah| Uptext}}</div>
                        <div class="timeline-body">Kelas : {{other_families.Kelas| Uptext}}</div>
                      </div>
                    </li>
                    <li>
                      <i class="fa fa-clock-o bg-gray"></i>
                    </li>
                  </ul>
                </div>
                <!-- /.tab-pane Permasalahan Anak -->
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
              </div>
              <!-- /.tab-content -->
            </div>
            <!-- /.card-body -->
          </div>
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Riwayat Pendidikan Anak</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped">
                <tbody>
                  <tr>
                    <th>Tanggal Masuk</th>
                    <th>Nama Sekolah</th>
                    <th>Alamat Sekolah</th>
                  </tr>
                  <tr v-for="edu in children_education" :key="edu.id">
                    <td>{{edu.Tahun_Ajaran | myDate}}</td>
                    <td>{{edu.Nama_Sekolah | Uptext}}</td>
                    <td>{{edu.Alamat_Sekolah | Uptext}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title">Detail Document Anak</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped">
                <tbody>
                  <tr>
                    <th>Asli/Photo Copy</th>
                    <th>Keterangan Document</th>
                    <th>Document</th>
                  </tr>
                  <tr v-for="doc in children_detail_document" :key="doc.id">
                    <td>{{doc.Asli_Fotocopy | Uptext}}</td>
                    <td>{{doc.Keterangan | Uptext}}</td>
                    <td>
                      <img
                        class="profile-user-img img-fluid"
                        :src="'img/document/'+doc.Document"
                        alt="User profile picture"
                      >
                    </td>
                  </tr>
                </tbody>
              </table>
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

<style>
</style>

<script>
export default {
  data() {
    return {
      userauth: new Form({
        id: "",
        name: ""
      }),
      children: {},
      children_education: {},
      children_other_families: {},
      children_detail_document: {},
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
        Alasan_yg_menitipkan: "",

        //Biodata Anak
        Tinggi_Badan: "",
        Berat_Badan: "",
        Golongan_Darah: "",
        Alergi_Makanan: "",
        Alergi_Minuman: "",
        Alergi_Obat: ""
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
    loadRiwayatpendidikan() {
      if (this.$gate.isAdminOrUserOrKepala()) {
        axios
          .get(`api/edit-anak/${this.$route.params.idanak}`)
          .then(
            ({ data }) => (this.children_education = data.children_education)
          );
      }
    },
    loadSaudaraAnak() {
      if (this.$gate.isAdminOrUserOrKepala()) {
        axios
          .get(`api/edit-anak/${this.$route.params.idanak}`)
          .then(
            ({ data }) =>
              (this.children_other_families =
                data.children_detail_other_families)
          );
      }
    },
    loadDetailDocument() {
      if (this.$gate.isAdminOrUserOrKepala()) {
        axios
          .get(`api/edit-anak/${this.$route.params.idanak}`)
          .then(
            ({ data }) =>
              (this.children_detail_document = data.children_detail_document)
          );
      }
    }
  },
  created() {
    this.loadRiwayatpendidikan();
    this.loadSaudaraAnak();
    this.loadDetailDocument();
    axios.get(`api/edit-anak/${this.$route.params.idanak}`).then(response => {
      this.form.fill(response.data.children[0]);
    });
  }
};
</script>
