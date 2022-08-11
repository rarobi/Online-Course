<?php $__env->startSection('tab2','active'); ?>
<?php $__env->startSection('tab'); ?>
    <div class="h-20"></div>
    <div class="container-fluid">
        <div class="container">
            <div class="h-20"></div>
            <div class="col-md-6 col-xs-12 tab-con">
                <div class="ucp-section-box">
                    <div class="header back-red"> Instructor Info</div>
                    <div class="body">
                        <form method="post" action="/user/instructor/new/store">
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group">
                                <label class="control-label" for="inputDefault"> Name</label>
                                <select class="form-select form-control" name="name" required>
                                    <option value="">Select an instructor</option>
                                    <?php if(count($instructors) > 0): ?>
                                     <?php $__currentLoopData = $instructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instructor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($instructor->id); ?>"><?php echo e($instructor->name); ?></option>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                                    <?php endif; ?>
                                </select>
                            </div>


                            <div class="form-group">
                                <label class="control-label" for="inputDefault">Status</label>
                                <select class="form-select form-control" name="status" required>
                                    <option value="">Select an option</option>
                                    <option value="1">Active</option>
                                    <option value="0">In-Active</option> 
                                </select>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-custom pull-left" value="Save Changes"><?php echo e(trans('main.save_changes')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xs-12 tab-con">
                <?php if(count($lists) == 0): ?>
                    <div class="text-center">
                        <img src="/assets/default/images/empty/channel.png">
                        <div class="h-20"></div>
                        <span class="empty-first-line"> No Instructor Found</span>
                        <div class="h-10"></div>
                        <span class="empty-second-line">
                        <span><?php echo e(trans('main.channel_desc')); ?></span>
                        </span>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table ucp-table" id="chanel-table">
                            <thead class="back-blue">
                            <th class="text-center"> Name</th>
                            <th class="text-center"><?php echo e(trans('main.status')); ?></th>
                            <th class="text-center"><?php echo e(trans('main.controls')); ?></th>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-center">
                                        <?php
                                        $instructor = DB::table('instructor_info')->where('id', $list->instructor_id)->first();
                                        ?>
                                        <?php echo e(isset($instructor->name) ? \Illuminate\Support\Str::limit($instructor->name, 30, $end='...') : 'N/A'); ?>

                                        </td>
                                    <td class="text-center">
                                        <?php if($list->is_show == 1): ?>
                                            <b class="blue-s"> Active </b>
                                        <?php else: ?>
                                            <b class="green-s"> In-active</b>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" data-href="/user/instructor/delete/<?php echo e($list->id); ?>" data-toggle="modal" data-target="#confirm-delete" title="Delete instructor"><span class="crticon mdi mdi-delete-forever"></span></a>
                                        <!--<a href="/user/channel/edit/<?php echo e($list->id); ?>"><span class="crticon mdi mdi-lead-pencil"></span></a>-->
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(getTemplate().'.user.layout.articlelayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crbangla1234/laravel/resources/views/web/default/user/instructor/list.blade.php ENDPATH**/ ?>