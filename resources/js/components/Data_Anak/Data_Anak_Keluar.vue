<template>
  <section class="content">
    <div class="container-fluid">
      <div class="row mt-3" v-if="$gate.isAdminOrUser()">
        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{jumlahAnakKeluar}}</h3>
              <p>Arsip Anak</p>
            </div>
            <div class="icon">
              <i class="fas fa-child"></i>
            </div>
          </div>
        </div>
        <div class="col-12">
          <!-- card Data Anak Panti-->
          <div class="card card-danger card-outline">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-child"></i>
                Data Arsip Anak
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
                    <th>Keluar Panti</th>
                    <th>Detail</th>
                  </tr>
                  <tr v-for="child in childrenOut" :key="child.id">
                    <td>{{child.No_induk }}</td>
                    <td>{{child.Nama_Lengkap | Uptext}}</td>
                    <td>{{child.Tempat_lahir | Uptext}} , {{child.Tgl_lahir | myDate}}</td>
                    <td>{{child.deleted_at | myDate}}</td>
                    <td>
                      <router-link :to="`anak-keluar${child.id_children}`">
                        <button type="button" class="btn btn-outline-warning btn-sm">Lihat Detail</button>
                      </router-link>
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
      jumlahAnakKeluar: {},
      childrenOut: {},
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
      })
    };
  },
  mounted() {
    console.log("Component mounted.");
  },
  computed: {},
  methods: {
    LoadChildren() {
      if (this.$gate.isAdminOrUser()) {
        axios
          .get("api/children")
          .then(({ data }) => (this.childrenOut = data.childrenOut));
      }
    },

    LoadJumlahAnakKeluar() {
      if (this.$gate.isAdminOrUser()) {
        axios
          .get("api/children")
          .then(({ data }) => (this.jumlahAnakKeluar = data.countChildrenOut));
      }
    }
  },
  created() {
    this.LoadChildren();
    this.LoadJumlahAnakKeluar();
    Fire.$on("AfterCreated", () => {
      this.LoadChildren();
      this.LoadJumlahAnakKeluar();
    });
  }
};
</script>
