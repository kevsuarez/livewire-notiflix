<script>
    window.addEventListener('livewire-notiflix:notify', e => {        
        callFn(e.detail.fnName, [
            e.detail.message,
            (e.detail.onNotifyClick)
                ? (() => {
                    Livewire.emit(e.detail.onNotifyClick)
                })
                : undefined,
            e.detail.options
        ]);
    });

    window.addEventListener('livewire-notiflix:alert', e => {
        callFn(e.detail.fnName, [
            e.detail.title,
            e.detail.message,
            e.detail.buttonText,
            (e.detail.onAlertClick)
                ? (() => {
                    Livewire.emit(e.detail.onAlertClick)
                })
                : undefined,
            e.detail.options
        ]);
    });

    window.addEventListener('livewire-notiflix:confirming', confirming => {
        window.addEventListener(confirming.detail, e => {
            callFn(e.detail.fnName, [
                e.detail.title,
                e.detail.message,
                e.detail.confirmButtonText,
                e.detail.cancelButtonText,
                function(){
                    Livewire.emit(e.detail.onConfirmed, e.detail.options["params"])
                },
                function(){
                    const cancelCallback = e.detail.onCancelled;
                    if (!cancelCallback) { return; } 
                    Livewire.emit(cancelCallback)
                },
                e.detail.options
            ]);
        });
    });

    window.addEventListener('livewire-notiflix:asking', asking => {
        window.addEventListener(asking.detail, e => {
            callFn(e.detail.fnName, [
                e.detail.title,
                e.detail.question,
                e.detail.answer,
                e.detail.answerButtonText,
                e.detail.cancelButtonText,
                function(){
                    Livewire.emit(e.detail.onAskConfirmed, e.detail.options["params"])
                },
                function(){
                    const cancelCallback = e.detail.onAskCancelled;
                    if (!cancelCallback) { return; }
                    Livewire.emit(cancelCallback)
                },
                e.detail.options
            ]);
        });
    });
</script>

@if(session()->has('livewire-notiflix'))
<script>
    const flash = @json(session('livewire-notiflix'));
    window.dispatchEvent(new CustomEvent('livewire-notiflix:' + flash.mode, {
        detail: flash.args
    }));
</script>
@endif