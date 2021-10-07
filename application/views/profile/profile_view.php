<section class="page-users-view">
    <div class="row">
        <!-- account start -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Account</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="users-view-image">
                            <img src="<?= base_url() ?>assets/app-assets/images/portrait/small/avatar-s-12.jpg" class="users-avatar-shadow w-100 rounded mb-2 pr-2 ml-1" alt="avatar">
                        </div>
                        <div class="col-12 col-sm-9 col-md-6 col-lg-5">
                            <table>
                                <tr>
                                    <td class="font-weight-bold">Username</td>
                                    <td><?= userdata('username') ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Name</td>
                                    <td><?= userdata('nama') ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Email</td>
                                    <td><?= userdata('email') ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-12 col-md-12 col-lg-5">
                            <table class="ml-0 ml-sm-0 ml-lg-0">
                                <tr>
                                    <td class="font-weight-bold">Status</td>
                                    <td>active</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Role</td>
                                    <td><?= userdata('role') ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-12">
                            <a href="<?= site_url('profile/edit/') . userdata('id_user')?>" class="btn btn-primary mr-1"><i class="feather icon-edit-1"></i> Edit</a>
                            <button class="btn btn-outline-danger"><i class="feather icon-trash-2"></i> Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- account end -->
    </div>
</section>