class SnapdragonDropdown {
    constructor( e ) {
        this.e          = e
        this.toggle     = e.querySelector( '.toggle' )
        this.icon       = e.querySelector( '.icon' )
        this.content    = e.querySelector( '.content' )
        
        this.toggle.addEventListener( 'click' , (e)=>this.toggling(e) )
        window.addEventListener( 'click' , (e)=>this.clickOnBody(e) )
    }
    
    clickOnBody(e) {
        if( !e.target.matches( `#${this.e.id}.dropdown, #${this.e.id}.dropdown *` ) ) {
            this.deactivate()
        }
        
    }

    toggling(e) {
        e.preventDefault();
        this.e.classList.contains( 'active' ) ? this.deactivate(e) : this.activate(e);
    }
    
    on(e) {
        e.preventDefault();
        this.activate(e);
    }
    
    off(e) {
        e.preventDefault();
        this.deactivate();
    }

    activate() {
        this.icon.style.rotate = '-180deg';
        this.e.classList.add( 'active' )
        this.content.style.display = 'block';
        
        setTimeout( ()=>{
            this.content.style.translate = '0 0';
            this.content.style.opacity = 1;
        }, 50 );
    }
    
    deactivate() {
        this.icon.style.rotate = '0deg';
        this.e.classList.remove( 'active' );
        this.content.style.translate = '0 calc(1/4*100%)';
        this.content.style.opacity = 0;
        
        setTimeout( ()=>{
            this.content.removeAttribute('style');
        }, 300 );
    }
}

document.addEventListener('DOMContentLoaded', function(){
    document.snapdragonDropdown = {}
    document.querySelectorAll('.dropdown').forEach((e) => {
        return Object.assign(document.snapdragonDropdown,{ [e.getAttribute('id')] : new SnapdragonDropdown(e) });
    });
});