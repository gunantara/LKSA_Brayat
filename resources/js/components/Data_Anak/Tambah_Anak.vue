<template>
  <section class="content">
    <div class="container-fluid">
      <div class="row mt-2" v-if="$gate.isAdminOrUser()">
        <div class="col md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header p-3">
              <h3 class="card-title">Tambah Data Anak</h3>
            </div>
            <!-- /.card-header -->
            <!-- Tab pick -->
            <div class="card">
              <div class="p-2">
                <ul class="nav nav-pills p-0">
                  <li class="nav-item">
                    <a class="nav-link active show" href="#data_anak" data-toggle="tab">Detail Anak</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#data_ortu" data-toggle="tab">Detail Orang Tua</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#biodata" data-toggle="tab">Biodata Anak</a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- Tab pick -->
            <!-- form start -->
            <form role="form" v-on:submit.prevent="createDataAnak">
              <div class="card-body">
                <div class="tab-content">
                  <!-- Data Anak Tab -->
                  <div class="tab-pane active show" id="data_anak">
                    <div class="form-row">
                      <div class="col-2">
                        <label for="inputNo_induk">No induk</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="fas fa-sort-numeric-down"></i>
                            </span>
                          </div>
                          <input
                            v-model="form.No_induk"
                            type="text"
                            name="No_induk"
                            placeholder="No induk"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('No_induk') }"
                          >
                          <has-error :form="form" field="No_induk"></has-error>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="inputNama_lengkap">Nama Lengkap Anak</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="fas fa-child"></i>
                              </span>
                            </div>
                            <input
                              v-model="form.Nama_Lengkap"
                              type="text"
                              name="Nama_lengkap"
                              placeholder="Nama Lengkap Anak"
                              class="form-control"
                              :class="{ 'is-invalid': form.errors.has('Nama_Lengkap') }"
                            >
                            <has-error :form="form" field="Nama_Lengkap"></has-error>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col-3">
                        <div class="form-group">
                          <label for="photo" class="control-label">Foto Anak</label>
                          <div class="card card-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header text-white">
                              <div class="text-center">
                                <div
                                  v-if="this.form.Photo_anak === ''"
                                  class="widget-user-image-anak"
                                >
                                  <img
                                    class="profile-user-img img-fluid img-circle"
                                    src="img/photo_anak/girl.png"
                                    alt="User Avatar"
                                  >
                                </div>
                                <div v-else class="widget-user-image-anak">
                                  <img
                                    class="profile-user-img img-fluid img-circle"
                                    :src="getProfilePhoto()"
                                    alt="User Avatar"
                                  >
                                </div>
                              </div>
                            </div>
                            <input
                              type="file"
                              @change="updateProfile"
                              name="Photo_anak"
                              class="form-control"
                              :class="{ 'is-invalid': form.errors.has('Photo_anak') }"
                            >
                            <has-error :form="form" field="Photo_anak"></has-error>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="inputAlamat">Alamat</label>
                          <textarea
                            v-model="form.Alamat"
                            rows="4"
                            class="form-control"
                            type="text"
                            name="Alamat"
                            placeholder="Alamat Anak ..."
                            :class="{ 'is-invalid': form.errors.has('Alamat') }"
                          ></textarea>
                          <has-error :form="form" field="Alamat"></has-error>
                        </div>
                        <div class="form-row">
                          <div class="col">
                            <div class="form-group">
                              <label for="inputAgama">Agama</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="fas fa-church"></i>
                                  </span>
                                </div>
                                <select
                                  v-model="form.Agama"
                                  type="text"
                                  name="Agama"
                                  placeholder="Agama"
                                  class="form-control"
                                  :class="{ 'is-invalid': form.errors.has('Agama') }"
                                >
                                  <option value disabled selected>Pilih Agama</option>
                                  <option value="islam">Islam</option>
                                  <option value="kristen">Kristen</option>
                                  <option value="katolik">Katolik</option>
                                  <option value="hindu">Hindu</option>
                                  <option value="budha">Budha</option>
                                </select>
                                <has-error :form="form" field="Agama"></has-error>
                              </div>
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label for="inputtempatlahir">Tempat Lahir</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="fas fa-map"></i>
                                  </span>
                                </div>
                                <input
                                  v-model="form.Tempat_lahir"
                                  type="text"
                                  name="Tempat_lahir"
                                  placeholder="Tempat Lahir"
                                  class="form-control"
                                  :class="{ 'is-invalid': form.errors.has('Tempat_lahir') }"
                                >
                                <has-error :form="form" field="Tempat_lahir"></has-error>
                              </div>
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label for="tgl_lahir">Tanggal Lahir</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="fas fa-calendar-week"></i>
                                  </span>
                                </div>
                                <date-picker
                                  v-model="form.Tgl_lahir"
                                  name="Tgl_lahir"
                                  :config="options"
                                  placeholder="Masukkan Tanggal"
                                  class="form-control"
                                  :class="{ 'is-invalid': form.errors.has('Tgl_lahir') }"
                                ></date-picker>
                                <has-error :form="form" field="Tgl_lahir"></has-error>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="col">
                            <div class="form-group">
                              <label for="Tgl_masuk_PA">Tanggal Masuk PA</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="fas fa-calendar-week"></i>
                                  </span>
                                </div>
                                <date-picker
                                  v-model="form.Tgl_masuk_PA"
                                  :config="options"
                                  placeholder="Masukkan Tanggal"
                                  class="form-control"
                                  :class="{ 'is-invalid': form.errors.has('Tgl_masuk_PA') }"
                                ></date-picker>
                                <has-error :form="form" field="Tgl_masuk_PA"></has-error>
                              </div>
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label for="inputkelengkapansurat">Kelengkapan Surat</label>
                              <select
                                v-model="form.Surat_Kelahiran_Akta"
                                type="text"
                                name="Surat_Kelahiran_Akta"
                                class="form-control"
                                :class="{ 'is-invalid': form.errors.has('Surat_Kelahiran_Akta') }"
                              >
                                <option value disabled selected>Pilih Kelengkapan Surat</option>
                                <option value="Akta Kelahiran">Akta Kelahiran</option>
                                <option value="Surat Kelahiran">Surat Kelahiran</option>
                              </select>
                              <has-error :form="form" field="Surat_Kelahiran_Akta"></has-error>
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label for="inputketeranagAnak">Keterangan Anak</label>
                              <select
                                v-model="form.Keterangan_anak"
                                type="text"
                                name="Keterangan_anak"
                                class="form-control"
                                :class="{ 'is-invalid': form.errors.has('Keterangan_anak') }"
                              >
                                <option value disabled selected>Pilih Keterangan Anak</option>
                                <option value="Panti">Panti</option>
                                <option value="Non-Panti">Non-Panti</option>
                              </select>
                              <has-error :form="form" field="Keterangan_anak"></has-error>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="col">
                        <div class="form-group">
                          <label for="inputmulaimasukSekolah">Mulai Masuk Sekolah</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="fas fa-calendar-week"></i>
                              </span>
                            </div>
                            <date-picker
                              v-model="form.Mulai_masuk_sekolah"
                              :config="options"
                              placeholder="Masukkan Tanggal"
                              class="form-control"
                              :class="{ 'is-invalid': form.errors.has('Mulai_masuk_sekolah') }"
                            ></date-picker>
                            <has-error :form="form" field="Mulai_masuk_sekolah"></has-error>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="inputtempatlahir">Nama Sekolah</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="fas fa-school"></i>
                              </span>
                            </div>
                            <input
                              v-model="form.Nama_sekolah"
                              type="text"
                              name="Nama_sekolah"
                              placeholder="Nama sekolah"
                              class="form-control"
                              :class="{ 'is-invalid': form.errors.has('Nama_sekolah') }"
                            >
                            <has-error :form="form" field="Nama_sekolah"></has-error>
                          </div>
                        </div>
                      </div>
                      <div class="col-2">
                        <div class="form-group">
                          <label for="kelas">Kelas</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="fas fa-school"></i>
                              </span>
                            </div>
                            <input
                              v-model="form.Kelas"
                              type="text"
                              name="Kelas"
                              placeholder="Kelas"
                              class="form-control"
                              :class="{ 'is-invalid': form.errors.has('Kelas') }"
                            >
                            <has-error :form="form" field="Nama_sekolah"></has-error>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col">
                        <div class="form-group">
                          <label for="inputAlamat">Sebab Masuk PA</label>
                          <textarea
                            v-model="form.Sebab_masuk_PA"
                            rows="4"
                            class="form-control"
                            type="text"
                            name="Sebab_masuk_PA"
                            placeholder="Sebab masuk PA . . ."
                            :class="{ 'is-invalid': form.errors.has('Sebab_masuk_PA') }"
                          ></textarea>
                          <has-error :form="form" field="Sebab_masuk_PA"></has-error>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col">
                        <label for="inputNo_induk">Nama Wali</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="fas fa-user"></i>
                            </span>
                          </div>
                          <input
                            v-model="form.Nama_Wali"
                            type="text"
                            name="Nama_Wali"
                            placeholder="Nama Wali"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('Nama_Wali') }"
                          >
                          <has-error :form="form" field="Nama_Wali"></has-error>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                          <label for="inputNama_lengkap">Nomor Telepon Wali</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="fas fa-phone"></i>
                              </span>
                            </div>
                            <input
                              v-model="form.Nomor_telp_wali"
                              type="text"
                              name="Nomor_telp_wali"
                              placeholder="Nomor telp wali"
                              class="form-control"
                              :class="{ 'is-invalid': form.errors.has('Nomor_telp_wali') }"
                            >
                            <has-error :form="form" field="Nomor_telp_wali"></has-error>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col">
                        <div class="form-group">
                          <label for="inputAlamat">Alamat Yang Menitipkan Anak</label>
                          <textarea
                            v-model="form.Alamat_yg_menitipkan"
                            rows="4"
                            class="form-control"
                            type="text"
                            name="Alamat_yg_menitipkan"
                            placeholder="Alamat Yang Menitipkan Anak . . ."
                            :class="{ 'is-invalid': form.errors.has('Alamat_yg_menitipkan') }"
                          ></textarea>
                          <has-error :form="form" field="Alamat_yg_menitipkan"></has-error>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="inputAlamat">Alasan Yang Menitipkan Anak</label>
                          <textarea
                            v-model="form.Alasan_yg_menitipkan"
                            rows="4"
                            class="form-control"
                            type="text"
                            name="Alasan_yg_menitipkan"
                            placeholder="Alasan Yang Menitipkan Anak . . . "
                            :class="{ 'is-invalid': form.errors.has('Alasan_yg_menitipkan') }"
                          ></textarea>
                          <has-error :form="form" field="Alasan_yg_menitipkan"></has-error>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Data Orang Tua Tab -->
                  <div class="tab-pane" id="data_ortu">
                    <div class="form-row">
                      <div class="col">
                        <label for="inputNo_induk">Nama Ayah</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="fas fa-user"></i>
                            </span>
                          </div>
                          <input
                            v-model="form.Nama_Ayah"
                            type="text"
                            name="Nama_Ayah"
                            placeholder="Nama Ayah"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('Nama_Ayah') }"
                          >
                          <has-error :form="form" field="Nama_Ayah"></has-error>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="inputNama_lengkap">Nama Ibu</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="fas fa-user"></i>
                              </span>
                            </div>
                            <input
                              v-model="form.Nama_Ibu"
                              type="text"
                              name="Nama_Ibu"
                              placeholder="Nama Ibu"
                              class="form-control"
                              :class="{ 'is-invalid': form.errors.has('Nama_Ibu') }"
                            >
                            <has-error :form="form" field="Nama_Ibu"></has-error>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col">
                        <div class="form-group">
                          <label for="inputAlamat">Alamat Ayah</label>
                          <textarea
                            v-model="form.Alamat_Ayah"
                            rows="4"
                            class="form-control"
                            type="text"
                            name="Alamat_Ayah"
                            placeholder="Alamat Ayah . . ."
                            :class="{ 'is-invalid': form.errors.has('Alamat_Ayah') }"
                          ></textarea>
                          <has-error :form="form" field="Alamat_Ayah"></has-error>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="inputAlamat">Alamat Ibu</label>
                          <textarea
                            v-model="form.Alamat_Ibu"
                            rows="4"
                            class="form-control"
                            type="text"
                            name="Alamat_Ibu"
                            placeholder="Alamat Ibu . . ."
                            :class="{ 'is-invalid': form.errors.has('Alamat_Ibu') }"
                          ></textarea>
                          <has-error :form="form" field="Alamat_Ibu"></has-error>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col">
                        <div class="form-group">
                          <label for="inputAgamaAyah">Agama Ayah</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="fas fa-church"></i>
                              </span>
                            </div>
                            <select
                              v-model="form.Agama_Ayah"
                              type="text"
                              name="Agama_Ayah"
                              placeholder="Agama Ayah"
                              class="form-control"
                              :class="{ 'is-invalid': form.errors.has('Agama_Ayah') }"
                            >
                              <option value disabled selected>Pilih Agama</option>
                              <option value="islam">Islam</option>
                              <option value="kristen">Kristen</option>
                              <option value="katolik">Katolik</option>
                              <option value="kristen">Hindu</option>
                              <option value="kristen">Budha</option>
                            </select>
                            <has-error :form="form" field="Agama_Ayah"></has-error>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="inputAgamaIbu">Agama Ibu</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="fas fa-church"></i>
                              </span>
                            </div>
                            <select
                              v-model="form.Agama_Ibu"
                              type="text"
                              name="Agama_Ibu"
                              placeholder="Agama Ibu"
                              class="form-control"
                              :class="{ 'is-invalid': form.errors.has('Agama_Ibu') }"
                            >
                              <option value disabled selected>Pilih Agama</option>
                              <option value="islam">Islam</option>
                              <option value="kristen">Kristen</option>
                              <option value="katolik">Katolik</option>
                              <option value="kristen">Hindu</option>
                              <option value="kristen">Budha</option>
                            </select>
                            <has-error :form="form" field="Agama_Ibu"></has-error>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col">
                        <label for="inputStatusAyah">Status Ayah</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="fas fa-book-reader"></i>
                            </span>
                          </div>
                          <input
                            v-model="form.Status_Ayah"
                            type="text"
                            name="Status_Ayah"
                            placeholder="Status Ayah"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('Status_Ayah') }"
                          >
                          <has-error :form="form" field="Status_Ayah"></has-error>
                        </div>
                      </div>
                      <div class="col">
                        <label for="inputStatusIbu">Status Ibu</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="fas fa-book-reader"></i>
                            </span>
                          </div>
                          <input
                            v-model="form.Status_Ibu"
                            type="text"
                            name="Status_Ibu"
                            placeholder="Status Ibu"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('Status_Ibu') }"
                          >
                          <has-error :form="form" field="Status_Ibu"></has-error>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col">
                        <div class="form-group">
                          <label for="inputPendidikanTerakhir">Pendidikan Ayah</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="fas fa-user-graduate"></i>
                              </span>
                            </div>
                            <select
                              v-model="form.Pendidikan_Ayah"
                              type="text"
                              name="Pendidikan_Ayah"
                              placeholder="Pendidikan Ayah"
                              class="form-control"
                              :class="{ 'is-invalid': form.errors.has('Pendidikan_Ayah') }"
                            >
                              <option value disabled selected>Pendidikan Terakhir</option>
                              <option value="Sekolah Dasar">SD</option>
                              <option value="Sekolah Menengah Pertama">SMP</option>
                              <option value="Sekolah Menengah Atas">SMA</option>
                              <option value="Strata-1">Strata-1</option>
                              <option value="Strata-2">Strata-2</option>
                            </select>
                            <has-error :form="form" field="Pendidikan_Ayah"></has-error>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="inputPendidikanTerakhir">Pendidikan Ibu</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="fas fa-user-graduate"></i>
                              </span>
                            </div>
                            <select
                              v-model="form.Pendidikan_Ibu"
                              type="text"
                              name="Pendidikan_Ibu"
                              placeholder="Pendidikan Ibu"
                              class="form-control"
                              :class="{ 'is-invalid': form.errors.has('Pendidikan_Ibu') }"
                            >
                              <option value disabled selected>Pendidikan Terakhir</option>
                              <option value="Sekolah Dasar">SD</option>
                              <option value="Sekolah Menengah Pertama">SMP</option>
                              <option value="Sekolah Menengah Atas">SMA</option>
                              <option value="Strata-1">Strata-1</option>
                              <option value="Strata-2">Strata-2</option>
                            </select>
                            <has-error :form="form" field="Pendidikan_Ibu"></has-error>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col">
                        <label for="inputNo_induk">Pekerjaan Ayah</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="fas fa-briefcase"></i>
                            </span>
                          </div>
                          <input
                            v-model="form.Pekerjaan_Ayah"
                            type="text"
                            name="Pekerjaan_Ayah"
                            placeholder="Pekerjaan Ayah"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('Pekerjaan_Ayah') }"
                          >
                          <has-error :form="form" field="Pekerjaan_Ayah"></has-error>
                        </div>
                      </div>
                      <div class="col">
                        <label for="inputNo_induk">Pekerjaan Ibu</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="fas fa-briefcase"></i>
                            </span>
                          </div>
                          <input
                            v-model="form.Pekerjaan_Ibu"
                            type="text"
                            name="Pekerjaan_Ibu"
                            placeholder="Pekerjaan Ibu"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('Pekerjaan_Ibu') }"
                          >
                          <has-error :form="form" field="Pekerjaan_Ibu"></has-error>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col">
                        <label for="inputNo_induk">Penghasilan Ayah</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                          </div>
                          <input
                            v-model="form.Penghasilan_Ayah"
                            type="text"
                            name="Penghasilan_Ayah"
                            placeholder="Penghasilan Ayah"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('Penghasilan_Ayah') }"
                          >
                          <has-error :form="form" field="Penghasilan_Ayah"></has-error>
                          <div class="input-group-prepend">
                            <span class="input-group-text">.00</span>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <label for="inputNo_induk">Penghasilan Ibu</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                          </div>
                          <input
                            v-model="form.Penghasilan_Ibu"
                            type="text"
                            name="Penghasilan_Ibu"
                            placeholder="Penghasilan Ibu"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('Penghasilan_Ibu') }"
                          >
                          <has-error :form="form" field="Penghasilan_Ibu"></has-error>
                          <div class="input-group-prepend">
                            <span class="input-group-text">.00</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col">
                        <label for="inputNo_induk">Tanggungan</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="fas fa-child"></i>
                            </span>
                          </div>
                          <input
                            v-model="form.Tanggungan"
                            type="text"
                            name="Tanggungan"
                            placeholder="Tanggungan"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('Tanggungan') }"
                          >
                          <has-error :form="form" field="Tanggungan"></has-error>
                        </div>
                      </div>
                      <div class="col">
                        <label for="inputNo_induk">Perumahan</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="fas fa-home"></i>
                            </span>
                          </div>
                          <input
                            v-model="form.Perumahan"
                            type="text"
                            name="No_induk"
                            placeholder="Perumahan"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('Perumahan') }"
                          >
                          <has-error :form="form" field="Perumahan"></has-error>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputAlamat">Latar Belakang Permasalahan</label>
                      <textarea
                        v-model="form.Latar_Belakang_Permasalahan"
                        rows="4"
                        class="form-control"
                        type="text"
                        name="Latar_Belakang_Permasalahan"
                        placeholder="Latar Belakang Permasalahan ..."
                        :class="{ 'is-invalid': form.errors.has('Latar_Belakang_Permasalahan') }"
                      ></textarea>
                      <has-error :form="form" field="Latar_Belakang_Permasalahan"></has-error>
                    </div>
                  </div>
                  <!-- Biodata Anak -->
                  <div class="tab-pane" id="biodata">
                    <div class="form-row">
                      <div class="col">
                        <div class="form-group">
                          <label for="inputTinggiBadan">Tinggi Badan</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="fas fa-text-height"></i>
                              </span>
                            </div>
                            <input
                              v-model="form.Tinggi_Badan"
                              type="text"
                              name="Tinggi_Badan"
                              placeholder="Tinggi Badan"
                              class="form-control"
                              :class="{ 'is-invalid': form.errors.has('Tinggi_Badan') }"
                            >
                            <has-error :form="form" field="Tinggi_Badan"></has-error>
                            <div class="input-group-prepend">
                              <span class="input-group-text">CM</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="inputBeratBadan">Berat Badan</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="fas fa-weight"></i>
                              </span>
                            </div>
                            <input
                              v-model="form.Berat_Badan"
                              type="text"
                              name="Berat_Badan"
                              placeholder="Berat Badan"
                              class="form-control"
                              :class="{ 'is-invalid': form.errors.has('Berat_Badan') }"
                            >
                            <has-error :form="form" field="Berat_Badan"></has-error>
                            <div class="input-group-prepend">
                              <span class="input-group-text">KG</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="inputGologanDarah">Golongan Darah</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="fas fa-tint"></i>
                              </span>
                            </div>
                            <select
                              v-model="form.Golongan_Darah"
                              type="text"
                              name="Golongan_Darah"
                              placeholder="Pilih Golongan Darah Anak"
                              class="form-control"
                              :class="{ 'is-invalid': form.errors.has('Golongan_Darah') }"
                            >
                              <option value disabled selected>Pilih Golongan Darah Anak</option>
                              <option value="A">A</option>
                              <option value="B">B</option>
                              <option value="AB">AB</option>
                              <option value="O">O</option>
                            </select>
                            <has-error :form="form" field="Golongan_Darah"></has-error>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col">
                        <div class="form-group">
                          <label for="inputAlergiMakanan">Alergi Makanan</label>
                          <div class="input-group">
                            <textarea
                              v-model="form.Alergi_Makanan"
                              rows="4"
                              class="form-control"
                              type="text"
                              name="Alergi_Makanan"
                              placeholder="Alergi Makanan . . ."
                              :class="{ 'is-invalid': form.errors.has('Alergi_Makanan') }"
                            ></textarea>
                            <has-error :form="form" field="Alergi_Makanan"></has-error>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="inputAlergiMinuman">Alergi Minuman</label>
                          <div class="input-group">
                            <textarea
                              v-model="form.Alergi_Minuman"
                              rows="4"
                              class="form-control"
                              type="text"
                              name="Alergi_Minuman"
                              placeholder="Alergi Minuman . . ."
                              :class="{ 'is-invalid': form.errors.has('Alergi_Minuman') }"
                            ></textarea>
                            <has-error :form="form" field="Alergi_Minuman"></has-error>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="inputAlergiMinuman">Alergi Obat</label>
                          <div class="input-group">
                            <textarea
                              v-model="form.Alergi_Obat"
                              rows="4"
                              class="form-control"
                              type="text"
                              name="Alergi_Obat"
                              placeholder="Alergi Obat . . ."
                              :class="{ 'is-invalid': form.errors.has('Alergi_Obat') }"
                            ></textarea>
                            <has-error :form="form" field="Alergi_Obat"></has-error>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right">Tambah Data Anak</button>
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
      childrens: {},
      children_education: {},
      userauth: new Form({
        id: "",
        name: ""
      }),
      form: new Form({
        //Detail Anak
        id: "",
        id_user: "",
        No_induk: "",
        Nama_Lengkap: "",
        Agama: "",
        Tempat_lahir: "",
        Tgl_lahir: new Date().useCurrent,
        Surat_Kelahiran_Akta: "",
        Alamat: "",
        Mulai_masuk_sekolah: new Date().useCurrent,
        Nama_sekolah: "",
        Kelas: "",
        Tgl_masuk_PA: new Date().useCurrent,
        Administrasi_sekolah: "",
        Sebab_masuk_PA: "",
        Keterangan_anak: "",
        Nama_Wali: "",
        Nomor_telp_wali: "",
        Photo_anak: "",
        Alamat_yg_menitipkan: "",
        Alasan_yg_menitipkan: "",

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

        //Biodata Anak
        Tinggi_Badan: "",
        Berat_Badan: "",
        Golongan_Darah: "",
        Alergi_Makanan: "",
        Alergi_Minuman: "",
        Alergi_Obat: ""
      }),
      form_education: new Form({
        id_children: "",
        Tahun_Ajaran: "",
        Nama_Sekolah: "",
        Alamat_Sekolah: ""
      }),
      form_detail_document: new Form({
        id_children: "",
        Document: "",
        Asli_Fotocopy: "",
        Keterangan: ""
      }),
      form_other_family: new Form({
        id_children: "",
        Nama: "",
        Tempat_lahir: "",
        Tgl_lahir: "",
        Sekolah: "",
        Kelas: "",
        Keterangan: ""
      }),
      options: {
        format: "YYYY/MM/DD",
        useCurrent: true
      }
    };
  },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    loaduserAuth() {
      axios.get("api/profile").then(({ data }) => this.userauth.fill(data));
    },
    createDataAnak() {
      // store Children
      this.form.id_user = this.userauth.id;
      this.$Progress.start();
      this.form
        .post("api/children")
        .then(() => {
          toast.fire({
            type: "success",
            title: "Data Anak created successfully"
          });
          this.$router.push("data-anak");
          this.$Progress.finish();
        })
        .catch(() => {
          toast.fire({
            type: "error",
            title: "Something wrong when create a Data Anak"
          });
        });
    },
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
    this.loaduserAuth();
    Fire.$on("AfterCreated", () => {
      this.loaduserAuth();
    });
  }
};
</script>

