<div class="widget-first widget recent-posts" id="daftarprsh" style="max-height: 430px; overflow-y: auto;">
    <h3>Daftar Perusahaan</h3>
    <div class="recent-post group">
        <?php foreach ($list_prsh as $data) { ?>
        <div class="hentry-post group">
            <div class="thumb-img"><img src="<?= base_url('assets/images/articles/'.$data->logo) ?>" alt="001" title="001" width="55px" height="55px"  /></div>
            <div class="text">
                <a href="<?= base_url('main/perusahaandetail/'.$data->id) ?>" title="" class="title"><?= $data->nama ?></a>
                <p><?= $data->bidang ?></p>
                <a class="read-more" href="<?= base_url('main/perusahaandetail/'.$data->id) ?>">&rarr; Read More</a>
            </div>
        </div>
        <?php } ?>
    </div>
</div>