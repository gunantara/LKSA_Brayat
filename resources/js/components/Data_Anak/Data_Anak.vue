<template>
  <section class="content">
    <div class="container-fluid">
      <div class="row mt-3" v-if="$gate.isAdmin()">
        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{jumlahAnakPanti}}</h3>
              <p>Anak Panti</p>
            </div>
            <div class="icon">
              <i class="fas fa-child"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{jumlahAnakNonPanti}}</h3>
              <p>Anak Non-Panti</p>
            </div>
            <div class="icon">
              <i class="fas fa-child"></i>
            </div>
          </div>
        </div>
        <div class="col-12">
          <!-- card Data Anak Panti-->
          <div class="card card-info card-outline">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-child"></i>
                Data Anak Panti
              </h3>
              <div class="card-tools">
                <router-link to="/tambah-anak" class="nav-link">
                  <button class="btn btn-primary">
                    Tambah Baru
                    <i class="fa fa-user-plus"></i>
                  </button>
                </router-link>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <th>No. Induk</th>
                    <th>Nama Lengkap</th>
                    <th>Tempat/Tanggal Lahir</th>
                    <th>Masuk Panti</th>
                    <th>Detail</th>
                    <th>Modify</th>
                  </tr>
                  <tr v-for="child in childrens" :key="child.id">
                    <td>{{child.No_induk }}</td>
                    <td>{{child.Nama_Lengkap | Uptext}}</td>
                    <td>{{child.Tempat_lahir | Uptext}} , {{child.Tgl_lahir | myDate}}</td>
                    <td>{{child.Tgl_masuk_PA | myDate}}</td>
                    <td>
                      <router-link :to="`detail-anak${child.id_children}`">
                        <button type="button" class="btn btn-outline-warning btn-sm">Lihat Detail</button>
                      </router-link>
                    </td>
                    <td>
                      <router-link :to="`edit-anak${child.id_children}`">
                        <button type="button" class="btn btn-success btn-sm">
                          <i class="fa fa-edit"></i>
                        </button>
                      </router-link>
                      <button
                        type="button"
                        class="btn btn-danger btn-sm"
                        @click="deleteChildren(child.id)"
                      >
                        <i class="fa fa-archive"></i>
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer"></div>
          </div>
          <!-- /.card Data Anak Panti-->

          <!-- card Data Anak Non Panti-->
          <div class="card card-success card-outline">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-child"></i>
                Data Anak Non-Panti
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <th>No. Induk</th>
                    <th>Nama Lengkap</th>
                    <th>Tempat/Tanggal Lahir</th>
                    <th>Masuk Panti</th>
                    <th>Detail</th>
                    <th>Modify</th>
                  </tr>
                  <tr v-for="child in childrennon" :key="child.id">
                    <td>{{child.No_induk }}</td>
                    <td>{{child.Nama_Lengkap | Uptext}}</td>
                    <td>{{child.Tempat_lahir | Uptext}} , {{child.Tgl_lahir | myDate}}</td>
                    <td>{{child.Tgl_masuk_PA | myDate}}</td>
                    <td>
                      <router-link :to="`detail-anak${child.id_children}`">
                        <button type="button" class="btn btn-outline-warning btn-sm">Lihat Detail</button>
                      </router-link>
                    </td>
                    <td>
                      <router-link :to="`edit-anak${child.id_children}`">
                        <button type="button" class="btn btn-success btn-sm">
                          <i class="fa fa-edit"></i>
                        </button>
                      </router-link>
                      <button
                        type="button"
                        class="btn btn-danger btn-sm"
                        @click="deleteChildren(child.id)"
                      >
                        <i class="fa fa-archive"></i>
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer"></div>
          </div>
          <!-- /.card Data Anak Panti-->
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
      jumlahAnakPanti: {},
      jumlahAnakNonPanti: {},
      childrens: {},
      childrennon: {},
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
      date: new Date(),
      options: {
        format: "YYYY/MM/DD",
        useCurrent: false
      }
    };
  },
  mounted() {
    console.log("Component mounted.");
  },
  computed: {},
  methods: {
    LoadChildren() {
      if (this.$gate.isAdmin()) {
        axios
          .get("api/children")
          .then(({ data }) => (this.childrens = data.childrens));
      }
    },
    LoadChildrenNonPanti() {
      if (this.$gate.isAdmin()) {
        axios
          .get("api/children")
          .then(({ data }) => (this.childrennon = data.childrennon));
      }
    },
    LoadJumlahAnakPanti() {
      if (this.$gate.isAdmin()) {
        axios
          .get("api/children")
          .then(({ data }) => (this.jumlahAnakPanti = data.countChildren));
      }
    },
    LoadJumlahAnakNonPanti() {
      if (this.$gate.isAdmin()) {
        axios
          .get("api/children")
          .then(
            ({ data }) => (this.jumlahAnakNonPanti = data.countChildrennon)
          );
      }
    },
    deleteChildren(id) {
      swal
        .fire({
          title: "Anda yakin memindahkan data anak ke arsip anak?",
          text: " Data yang masuk arsip tidak bisa kembali lagi ",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Ya, Arsipkan!"
        })
        .then(result => {
          //send request to the server
          if (result.value) {
            this.form
              .delete("api/children/" + id)
              .then(() => {
                swal.fire(
                  "Diarsipkan!",
                  "File anak Telah Diarsipkan.",
                  "success"
                );
                Fire.$emit("AfterCreated");
              })
              .catch(() => {
                swal.fire("Gagal!", "Ada sesuatu yang salah", "warning");
              });
          }
        });
    }
  },
  created() {
    this.LoadChildren();
    this.LoadChildrenNonPanti();
    this.LoadJumlahAnakPanti();
    this.LoadJumlahAnakNonPanti();
    Fire.$on("AfterCreated", () => {
      this.LoadChildren();
      this.LoadChildrenNonPanti();
      this.LoadJumlahAnakPanti();
      this.LoadJumlahAnakNonPanti();
    });
  }
};
</script>
