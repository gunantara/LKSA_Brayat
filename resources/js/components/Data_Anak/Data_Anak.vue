<template>
  <section class="content">
    <div class="row mt-2" v-if="$gate.isAdmin()">
      <div class="col md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-child"></i>
              Data Anak
            </h3>
            <div class="card-tools">
              <router-link to="/tambah-anak" class="nav-link">
                <button class="btn btn-success">
                  Add New
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
                  <th>Agama</th>
                  <th>Alamat</th>
                  <th>Kelengkapan Surat</th>
                  <th>Detail</th>
                  <th>Modify</th>
                </tr>
                <tr v-for="child in childrens" :key="child.id">
                  <td>{{child.No_induk }}</td>
                  <td>{{child.Nama_Lengkap | Uptext}}</td>
                  <td>{{child.Tempat_lahir | Uptext}} , {{child.Tgl_lahir | myDate}}</td>
                  <td>{{child.Agama | Uptext}}</td>
                  <td>{{child.Alamat | Uptext}}</td>
                  <td>{{child.Surat_Kelahiran_Akta | Uptext}}</td>
                  <td>
                    <router-link to="/detail-anak">
                      <button type="button" class="btn btn-outline-warning btn-sm">Lihat Detail</button>
                    </router-link>
                  </td>
                  <td>
                    <router-link :to="`edit-anak${child.id_children}`">
                      <button type="button" class="btn btn-primary btn-sm">
                        <i class="fa fa-edit"></i>
                      </button>
                    </router-link>
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
  </section>
</template>

<script>
export default {
  data() {
    return {
      editmode: false,
      childrens: {},
      form: new Form({
        id_user: "",
        No_induk: "",
        Nama_Lengkap: "",
        Agama: "",
        Tempat_lahir: "",
        Tgl_lahir: new Date(),
        Surat_Kelahiran_Akta: "",
        Alamat: "",
        Mulai_masuk_sekolah: "",
        Nama_sekolah: "",
        Kelas: "",
        Tgl_masuk_PA: new Date(),
        Administrasi_sekolah: "",
        Sebab_masuk_PA: "",
        Keterangan_anak: "",
        Nama_Wali: "",
        Nomor_telp_wali: "",
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
    }
  },
  created() {
    this.LoadChildren();
    Fire.$on("AfterCreated", () => {
      this.LoadChildren();
    });
  }
};
</script>
