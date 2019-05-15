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
                  <div v-for="photo in galeri" :key="photo.id" class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                      <span class="info-box-icon bg-success">
                        <i class="fas fa-image"></i>
                      </span>
                      <div class="info-box-content">
                        <span class="info-box-text">{{photo.Kegiatan}}</span>
                        <router-link :to="`detail-galery${photo.id}`">
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
      </div>
    </div>
  </section>
</template>
<script>
export default {
  data() {
    return {
      galeri: {}
    };
  },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    loadGaleri() {
      axios.get("api/galeri").then(({ data }) => (this.galeri = data.galeri));
    }
  },
  created() {
    this.loadGaleri();
  }
};
</script>
