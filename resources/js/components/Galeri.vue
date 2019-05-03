<template>
  <section class="content">
    <div class="container-fluid">
      <div class="mt-3">
        <div class="row">
          <div v-for="photo in galeri" :key="photo.id" class="col-md-3">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">{{photo.Kegiatan}}</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fa fa-plus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: block;">Jumlah</div>
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
