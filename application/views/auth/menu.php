<ul class="nav navbar-nav side-nav">
    <?php if ($this->session->userdata('level') === '0') { ?>
    <li class="<?= (empty($segment)?'active':'') ?>">
        <a href="<?= base_url('areafiftyone') ?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
    </li>
    <li class="<?= (($segment === 'slide_image')?'active':'') ?>">
        <a href="<?= base_url('areafiftyone/slide_image') ?>"><i class="fa fa-fw fa-image"></i> Opening Slide</a>
    </li>
    <li class="<?= (($segment === 'news')?'active':'') ?>">
        <a href="<?= base_url('areafiftyone/news') ?>"><i class="fa fa-fw fa-newspaper-o"></i> Berita</a>
    </li>
    <li class="<?= (($segment === 'jobvacancy')?'active':'') ?>">
        <a href="<?= base_url('areafiftyone/jobvacancy') ?>"><i class="fa fa-fw fa-table"></i> Lowongan</a>
    </li>
    <li class="<?= (($segment === 'perusahaan')?'active':'') ?>">
        <a href="<?= base_url('areafiftyone/perusahaan') ?>"><i class="fa fa-fw fa-building"></i> Perusahaan</a>
    </li>
    <li class="<?= (($segment === 'mitra')?'active':'') ?>">
        <a href="<?= base_url('areafiftyone/mitra') ?>"><i class="fa fa-fw fa-users"></i> Mitra</a>
    </li>
    <li class="<?= (($segment === 'jurusan')?'active':'') ?>">
        <a href="<?= base_url('areafiftyone/jurusan') ?>"><i class="fa fa-fw fa-wrench"></i> Jurusan</a>
    </li>
    <li class="<?= (($segment === 'pendaftar')?'active':'') ?>">
        <a href="<?= base_url('areafiftyone/pendaftar') ?>"><i class="fa fa-fw fa-user"></i> Pendaftar</a>
    </li>
    <li class="<?= (($segment === 'laporan')?'laporan':'') ?>">
        <a href="<?= base_url('areafiftyone/laporan') ?>"><i class="fa fa-fw fa-bar-chart"></i> Laporan</a>
    </li>
    <li class="<?= (($segment === 'berita')?'alumni':'') ?>">
        <a href="<?= base_url('areafiftyone/alumni') ?>"><i class="fa fa-fw fa-graduation-cap"></i> Alumni</a>
    </li>
    <li>
        &nbsp;
    </li>
    <?php } ?>
    <?php if ($this->session->userdata('level') === '1') { ?>
    <li class="<?= (empty($segment)?'active':'') ?>">
        <a href="<?= base_url('areafiftyone') ?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
    </li>
    <li class="<?= (($segment === 'pendaftar')?'active':'') ?>">
        <a href="<?= base_url('areafiftyone/pendaftar') ?>"><i class="fa fa-fw fa-user"></i> Pendaftar</a>
    </li>
    <li class="<?= (($segment === 'lamaran')?'active':'') ?>">
        <a href="<?= base_url('areafiftyone/lamaran') ?>"><i class="fa fa-fw fa-file-text-o"></i> Data Lamaran</a>
    </li>
    <?php } ?>
    <?php if ($this->session->userdata('level') === '2') { ?>
    <li class="<?= (empty($segment)?'active':'') ?>">
        <a href="<?= base_url('member') ?>"><i class="fa fa-fw fa-user-md"></i> Headquarter</a>
    </li>
    <li class="<?= (($segment === 'jobvacancy')?'active':'') ?>">
        <a href="<?= base_url('member/jobvacancy') ?>"><i class="fa fa-fw fa-folder-open"></i> Lowongan</a>
    </li>
    <li class="<?= (($segment === 'news')?'active':'') ?>">
        <a href="<?= base_url('member/lamaran') ?>"><i class="fa fa-fw fa-star"></i> Data Lamaran</a>
    </li>
    <?php } ?>
</ul>