<script>

    function copyMeOnClipboard() {
        /* Copy text into clipboard */
        navigator.clipboard.writeText
        (document.querySelector(".copyMe").value);
    }
    </script>
    <div class="mx-0">
        <p >
            PIX: <span class="select-all" >ats4slfi987ç3#</span>
             <button onclick="copyMeOnClipboard()" class="bg-teal-500 text-white border
            px-1 py-1 border-transparent rounded-md cursor-pointer">
            <i class="fa-regular fa-copy"></i> Copiar
        </p>
    </button>
        <input type="hidden" value="ats4slfi987ç3#" class="copyMe"/>
    </div>
