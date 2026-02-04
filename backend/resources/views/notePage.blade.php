<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Note Editor - {{ ucfirst($status) }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/stylenoteedit.css') }}" />
</head>
<body>
    <form id="noteForm" action="{{ route('note.store') }}" method="POST">
        @csrf
        <input type="hidden" name="status" value="{{ $status }}">
        <input type="hidden" name="title" id="hiddenTitle">
        <input type="hidden" name="content" id="hiddenContent">

        <div class="editor-panel">
            <div class="topbar">
                <button type="submit" style="background:none; border:none; color:white; cursor:pointer;">
                    <i class="fa-solid fa-floppy-disk" title="Save Note"></i>
                </button>
                <i class="fa-solid fa-image" title="Insert image"></i>
                <i class="fa-solid fa-bell" title="Notifications"></i>
            </div>

            <div class="editor-area">
                <input id="noteTitle" class="title-input" placeholder="Title" required />
                <div id="editor" class="content" contenteditable="true" data-placeholder="Your text..."></div>
            </div>

            <div class="editor-footer">
                @if($status === 'public')
                <button type="button" id="linkBtn" class="link-btn" title="Share Link">
                    <i class="fa-solid fa-link"></i>
                </button>
                @endif

                <div class="toolbar" role="toolbar">
                    <button type="button" data-cmd="formatBlock" data-value="h1">H1</button>
                    <button type="button" data-cmd="formatBlock" data-value="h2">H2</button>
                    <button type="button" data-cmd="fontSize" data-value="3">Aa</button>
                    <button type="button" data-cmd="bold"><b>B</b></button>
                    <button type="button" data-cmd="italic"><i>I</i></button>
                    <button type="button" data-cmd="underline"><u>U</u></button>
                    <button type="button" data-cmd="strikeThrough"><i class="fa-solid fa-strikethrough"></i></button>
                </div>
            </div>
        </div>
    </form>

    @if($status === 'public')
    <div class="overlay" id="overlay" style="display:none;"></div>
    <div class="share-popup" id="sharePopup" style="display:none;">
        <span>Share this file</span>
        <button type="button" id="copyBtn"><i class="fa fa-link"></i> Copy link</button>
    </div>
    @endif

    <script>
        (function () {
            const editor = document.getElementById("editor");
            const noteForm = document.getElementById("noteForm");
            const toolbar = document.querySelector(".toolbar");
            const linkBtn = document.getElementById("linkBtn");
            const overlay = document.getElementById("overlay");
            const popup = document.getElementById("sharePopup");

            // 1. Fungsi Toolbar (Rich Text)
            function exec(cmd, value = null) {
                editor.focus();
                document.execCommand(cmd, false, value);
            }

            toolbar.addEventListener("click", (e) => {
                const btn = e.target.closest("button");
                if (!btn) return;
                const cmd = btn.dataset.cmd;
                const value = btn.dataset.value || null;
                exec(cmd === "formatBlock" ? "formatBlock" : cmd, value);
            });

            // 2. Logika Pop-up Share (Hanya jika ada tombolnya)
            if (linkBtn) {
                linkBtn.addEventListener("click", () => {
                    overlay.style.display = "block";
                    popup.style.display = "flex";
                });
                
                overlay.addEventListener("click", () => {
                    overlay.style.display = "none";
                    popup.style.display = "none";
                });
            }

            // 3. Sinkronisasi Data ke Form Laravel
            noteForm.addEventListener("submit", function(e) {
                document.getElementById("hiddenTitle").value = document.getElementById("noteTitle").value;
                document.getElementById("hiddenContent").value = editor.innerHTML;

                if (editor.innerText.trim() === "") {
                    e.preventDefault();
                    alert("Content cannot be empty!");
                }
            });
        })();
    </script>
</body>
</html>