<!DOCTYPE html>
<html>
<form action="{{ route('getQR') }}" method="POST">
    @csrf
    <div id="url-inputs">
        <div class="input-group">
            <input type="url" name="urls[]" placeholder="https://example.com" required>
        </div>
    </div>

    <button type="button" onclick="addInput()">Добавить еще URL</button>
    <button type="submit">Сохранить</button>
</form>

<script>
    function addInput() {
        const div = document.createElement('div');
        div.className = 'input-group';
        div.innerHTML = '<input type="url" name="urls[]" placeholder="https://example.com">';
        document.getElementById('url-inputs').appendChild(div);
    }
</script>
