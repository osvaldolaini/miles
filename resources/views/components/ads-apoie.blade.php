<script>
    function copyMeOnClipboard() {
        /* Copy text into clipboard */
        navigator.clipboard.writeText(document.querySelector(".copyMe").value);
    }
</script>
<div class="mx-0">
    <p>
        PIX: <span class="select-all">594e9d46-7f8c-4a70-a06e-45dfaa27e5ea</span>
        <button onclick="copyMeOnClipboard()"
            class="bg-teal-500 text-white border
            px-1 py-1 border-transparent rounded-md cursor-pointer">
            <i class="fa-regular fa-copy"></i> Copiar
        </button>
    </p>

    <input type="hidden" value="594e9d46-7f8c-4a70-a06e-45dfaa27e5ea" class="copyMe" />
</div>
