<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Пользователи и роли</h1>
            
            <!-- Секция пользователей -->
            <div class="card mb-4">
                <div class="card-header">
                    <h2>Пользователи и их роли</h2>
                </div>
                <div class="card-body">
                    <ol>
                        <?php foreach($users as $user): ?>
                            <li >
                                <h5><?php echo e($user->name); ?> (<?php echo e($user->email); ?>)</h5>
                                <p><strong>Роли:</strong> 
                                    <?php 
                                    $roleNames = [];
                                    foreach($user->roles as $role) 
                                        $roleNames[] = $role->name;
                                    
                                    echo implode(' ', $roleNames);
                                    //implode - разделение запятыми
                                    ?>
                                </p>
                            </li>
                        <?php endforeach; ?>
                    </ol>
                </div>
            </div>

            <!-- Секция ролей -->
            <div class="card">
                <div class="card-header">
                    <h2>Роли и их пользователи</h2>
                </div>
                <div class="card-body">
                    <ol>
                        <?php foreach($roles as $role): ?>
                            <li>
                                <h5><?php echo e($role->name); ?></h5>
                                <p><strong>Пользователи:</strong> 
                                    <?php 
                                    $userNames = [];
                                    foreach($role->users as $user) {
                                        $userNames[] = $user->name;
                                    }
                                    echo implode(' ', $userNames);
                                    ?>
                                </p>
                            </li>
                        <?php endforeach; ?>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
