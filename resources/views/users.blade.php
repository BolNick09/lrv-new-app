<div class="container">

    <h1>Пользователи и роли</h1>

    <!-- Пользователи -->
    <div class="card">
        <div class="card-header">
            <h2>Пользователи и их роли</h2>
        </div>

        <div class="card-body">
            <ol>
                <?php foreach ($users as $user): ?>
                    <li>
                        <h5>
                            <?= e($user->name) ?> (<?= e($user->email) ?>)
                        </h5>

                        <p>
                            <strong>Роли:</strong>
                            <?= implode(', ', array_map(fn($r) => e($r['name']), $user->roles->toArray())) ?>
                        </p>
                    </li>
                <?php endforeach; ?>
            </ol>
        </div>
    </div>


    <!-- Роли -->
    <div class="card">
        <div class="card-header">
            <h2>Роли и их пользователи</h2>
        </div>

        <div class="card-body">
            <ol>
                <?php foreach ($roles as $role): ?>
                    <li>
                        <h5><?= e($role->name) ?></h5>

                        <p>
                            <strong>Пользователи:</strong>
                            <?= implode(', ', array_map(fn($u) => e($u['name']), $role->users->toArray())) ?>
                        </p>
                    </li>
                <?php endforeach; ?>
            </ol>
        </div>
    </div>

</div>


