<?php $__env->startSection('title','Meeting List'); ?>
<?php $__env->startSection('page'); ?>
    <div class="card">
        <div class="card-header">
            <div class="panel-actions">
                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
            </div>
            <h2 class="panel-title">Meeting List</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped mb-none m-b-0" id="datatable-details">
                    <thead>
                    <tr>
                        <th class="text-center"><?php echo e(trans('admin.title')); ?></th>
                        <th class="text-center"><?php echo e(trans('admin.contents')); ?></th>
                        <th class="text-center"><?php echo e(trans('admin.duration')); ?></th>
                        <th class="text-center"><?php echo e(trans('admin.start_date')); ?></th>
                        <th class="text-center"><?php echo e(trans('admin.start_time')); ?></th>
                        <th class="text-center"><?php echo e(trans('admin.join_url')); ?></th>
                        <th class="text-center"><?php echo e(trans('admin.type')); ?></th>
                        <th class="text-center"><?php echo e(trans('admin.th_controls')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="text-center"><?php echo $item->title ?? ''; ?></td>
                                <td class="text-center"><a target="_blank" href="/product/<?php echo $item->content->id ?? ''; ?>"><?php echo $item->content->title ?? ''; ?></a></td>
                                <td class="text-center"><?php echo $item->duration ?? ''; ?></td>
                                <td class="text-center"><?php echo $item->date ?? '-'; ?></td>
                                <td class="text-center"><?php echo date('H:i',$item->time_start) ?? '-'; ?></td>
                                <td class="text-center"><?php echo $item->join_url ?? ''; ?></td>
                                <td class="text-center"><?php echo $item->type ?? ''; ?></td>
                                <td class="text-center">
                                    <a href="/admin/live/details/<?php echo e($item->id); ?>" title="Edit"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
                                    <a href="#" data-href="/admin/live/delete/<?php echo e($item->id); ?>" title="Delete" data-toggle="modal" data-target="#confirm-delete" class="c-r"><i class="fa fa-times" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
        </div>
        <div class="card-footer">
            <?php echo $list->appends($_GET)->links('pagination.default'); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.newlayout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crbangla1234/laravel/resources/views/admin/live/list.blade.php ENDPATH**/ ?>