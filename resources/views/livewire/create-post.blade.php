<form wire:submit="save">
    <div>
        <label for="title">Заголовок поста</label>
    </div>
    <div>
        <input type="text" id="title" wire:model="title"/>
    </div>

    <div>
        <label for="content">Текст поста</label>
    </div>
    <div>
        <textarea id="content" cols="80" rows="5" wire:model="content"></textarea>
    </div>

    <div>
        <button type="submit">Обубликоватть</button>
    </div>
    
</form>