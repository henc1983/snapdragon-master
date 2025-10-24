class SnapdragonDropdown {
    constructor( e ) {
        this.e          = e
        this.toggle     = e.querySelector( '.toggle' )
        this.icon       = e.querySelector( '.icon' )
        this.content    = e.querySelector( '.content' )
        
        this.toggle.addEventListener( 'mouseover' , (e)=>this.activate(e) )
        this.e.addEventListener( 'mouseleave' , (e)=>this.deactivate(e) )        
    }
    
    activate(e) {
        e.preventDefault();
        this.icon.style.rotate = '-90deg';
        this.e.classList.add( 'active' )
        this.content.style.display = 'block';
        setTimeout( ()=>{
            this.content.style.translate = '0 0';
            this.content.style.opacity = 1;
        }, 50 );
    }
    
    deactivate(e) {
        e.preventDefault();
        this.icon.style.rotate = '0deg';
        this.e.classList.remove( 'active' );
        this.content.style.translate = '0 calc(1/4*100%)';
        this.content.style.opacity = 0;
        setTimeout( ()=>{
            this.content.style.display = 'none';
            this.content.removeAttribute('style');
        }, 250 );
    }
}

document.addEventListener('DOMContentLoaded', function(){
    document.snapdragonDropdown = {}
    document.querySelectorAll('.dropdown').forEach((e) => {
        return Object.assign(document.snapdragonDropdown,{ [e.getAttribute('id')] : new SnapdragonDropdown(e) });
    });
});