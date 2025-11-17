<style>
    .container 
{
    max-width: 900px;
    margin: 0 auto;
    padding: 20px;
    font-family: sans-serif;
}

h1 
{
    margin-bottom: 24px;
}

.card 
{
    border: 1px solid #ccc;
    border-radius: 8px;
    margin-bottom: 24px;
    overflow: hidden;
}

.card-header 
{
    background: #f5f5f5;
    padding: 12px 16px;
    border-bottom: 1px solid #ccc;
}

.card-header h2 
{
    margin: 0;
    font-size: 20px;
}

.card-body 
{
    padding: 16px;
}

ol 
{
    padding-left: 20px;
    margin: 0;
}

li 
{
    margin-bottom: 16px;
}

h5 
{
    margin: 0 0 4px 0;
    font-size: 17px;
}

p 
{
    margin: 0;
}
</style>
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


