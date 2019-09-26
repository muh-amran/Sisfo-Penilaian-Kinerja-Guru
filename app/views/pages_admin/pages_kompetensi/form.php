<div class="row">
    <div class="col-sm-12">
        <?php
        if ($this->session->flashdata('notification')) {
            echo $this->session->flashdata('notification');
        }
        $get = $this->uri->segment(2) == "edit" ? 'e' : 'i';
        ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="informasi"></div>
        <div class="panel panel-border panel-color-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $this->uri->segment(2); ?> <?php echo $this->myfunction->hapus_underscore($this->uri->segment(1)); ?></h3>
            </div>
            <div class="panel-body">
                <form action="/<?php echo $this->uri->segment(1) . '/proses/' . $get . '/' . $this->myfunction->_encdec('enc', rand()) . '/'; ?>" method="post" enctype="multipart/form-data" data-parsley-validate novalidate autocomplete="off">
                    <?php if ($this->uri->segment(2) == "edit") { ?>
                        <input type="hidden" value="<?php echo $this->uri->segment(3); ?>" name="id">
                    <?php } ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Tenaga Pendidik</label>
                                    <div class="col-md-3">
                                        <select name="id_tenaga_pendidik" class="form-control" required>
                                            <option value="">Pilih--</option>
                                            <?php
                                            if ($this->uri->segment(2) == "edit") {
                                                foreach ($select['jenis_tp']->result() as $row) {
                                                    if ($data->id_tenaga_pendidik == $row->id_tenaga_pendidik) {
                                                        echo "<option value='" . $row->id_tenaga_pendidik . "' selected>$row->jenis_tenaga_pendidik</option>";
                                                    } else {
                                                        echo "<option value='" . $row->id_tenaga_pendidik . "'>$row->jenis_tenaga_pendidik</option>";
                                                    }
                                                }
                                            } else {
                                                foreach ($select['jenis_tp']->result() as $row) {
                                                    echo "<option value='" . $row->id_tenaga_pendidik . "'>$row->jenis_tenaga_pendidik</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>  
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nama Kompetensi</label>
                                    <div class="col-md-5">
                                        <textarea class="form-control" name="nama_kompetensi" rows="3" placeholder="Nama Kompetensi" required><?= $this->uri->segment(2) == "edit" ? $data->nama_kompetensi : "" ?></textarea>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-9">
                                        <button type="submit" class="btn btn-color-primary waves-effect waves-light">Simpan</button>
                                        <button onClick="javascript:history.go(-1);" type="button" class="btn btn btn-inverse waves-effect waves-light">Batal</button>
                                    </div>
                                </div>

                            </div>
                        </div><!-- end col -->
                    </div><!-- end row -->
                </form>
            </div>
        </div>
    </div>
</div>