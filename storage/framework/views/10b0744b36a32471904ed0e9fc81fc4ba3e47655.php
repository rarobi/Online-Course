<?php $__env->startSection('title'); ?>
    Course Facilities
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page'); ?>
    <div class="card">
        <div class="card-body">
            <div class="tabs">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link active" href="#list" data-toggle="tab"> Course Facilities </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#newitem" data-toggle="tab">New Facility</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="list" class="tab-pane active">
                        <table class="table table-bordered table-striped mb-none" id="datatable-details">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Facility</th>
                                <th class="text-center">Is Show</th>
                                <th class="text-center"> created At</th>
                                <th class="text-center"><?php echo e(trans('admin.th_controls')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($list->id); ?></td>
                                    <td><?php echo e($list->name); ?></td>
                                    <td class="text-center">
                                        <?php if($list->is_show): ?>
                                            Yes
                                        <?php else: ?>
                                            No
                                        <?php endif; ?>   
                                    </td>
                                    <td class="text-center"><?php echo e($list->created_at); ?></td>
                                    <td class="text-center">
                                        <a href="/admin/content/facility-edit/<?php echo e($list->id); ?>" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                        <a href="#" data-href="/admin/content/facility-delete/<?php echo e($list->id); ?>" title="Delete" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div id="newitem" class="tab-pane ">
                        <form method="post" action="/admin/content/facility-store" class="form-horizontal form-bordered">
                            <?php echo e(csrf_field()); ?>

                
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault"> Facility</label>
                                <div class="col-md-6">
                                    <input type="text" name="name" required class="form-control" placeholder="Enter Facility Name">
                                </div>
                            </div>

                             <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault"> Status</label>
                                <div class="col-md-6">
                                    <select name="status" class="form-control" required>
                                        <option value=""> Select an option</option>
                                        <option value="1"> Show </option>
                                        <option value="0"> Hide </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-6">
                                    <button class="btn btn-primary" type="submit"><?php echo e(trans('admin.save_changes')); ?></button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.newlayout.layout',['breadcom'=>['Courses','Facilities']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crbangla1234/laravel/resources/views/admin/content/facility.blade.php ENDPATH**/ ?>