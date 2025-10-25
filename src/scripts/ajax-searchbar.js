class SnapdragonAjaxSearch {
    constructor(e) {
        this.e = e;
        this.input = e.querySelector( 'input[name="s"]' );
        this.content = e.querySelector( '.content' );
        this.typingTimerMainInput;
        this.typingInterval = 300;
        this.opened = false;

        this.input.addEventListener( 'input' , (e)=>this.onInput(e) );
        this.input.addEventListener( 'keyup' , (e)=>this.onKeyUp(e) );
        this.input.addEventListener( 'focus' , (e)=>this.onKeyUp(e) );
        this.input.addEventListener( 'keydown' , (e)=>this.onKeyDown(e) );
    }

    doneTypingMainInput() {
        if ( this.input.value.length > 2 && !this.content.querySelector('.spinner-animation') ) {
            const spinnerTemplate = document.getElementById('loader-animation-template');
            let spinner = spinnerTemplate.content.cloneNode(true);
            this.content.appendChild(spinner)
        }
    }
    
    onInput(e) {
        if( this.input.value.length > 2) {
            this.content.style.setProperty( 'display' , 'block')
            return;
        } 
        
        this.content.style.removeProperty( 'display' );
        return;
    }

    onKeyUp(e) {
        clearTimeout(this.typingTimerMainInput);
        this.typingTimerMainInput = setTimeout(() => this.doneTypingMainInput(), this.typingInterval);
    }

    onKeyDown(e) {
        clearTimeout(this.typingTimerMainInput);
    }

}

document.addEventListener('DOMContentLoaded', function(){
    document.snapdragonSearchbar = {}
    document.querySelectorAll('.searchbar').forEach((e) => {
        return Object.assign(document.snapdragonSearchbar,{ [e.getAttribute('id')] : new SnapdragonAjaxSearch(e) });
    });
});