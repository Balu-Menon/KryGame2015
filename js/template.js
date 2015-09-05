
;(function($){
	"use strict";
	var isIe = !!window.ActiveXObject,
		isWebkit = 'webkitRequestAnimationFrame' in window,
		letterHeight;

	$.fn.Input = function(){
		if( !isIe || 'ontouchstart' in document.documentElement )
			init( this );
		return this;
	}
	
	var Input = {
		classToggler : 'state1',

		keypress : function(e){
			var charString = String.fromCharCode(e.charCode),
				textCont = this.nextElementSibling,
				appendIndex = this.selectionEnd,
				newLine = this.tagName == 'TEXTAREA' && e.keyCode == 13;
				
			if( (this.selectionEnd - this.selectionStart) > 0 && e.charCode && !(e.metaKey || e.ctrlKey) ){
				var rangeToDel = [this.selectionStart, this.selectionEnd];
				appendIndex = this.selectionStart;
				
				if( charDir.lastDir == 'rtl' ){
					rangeToDel = [this.value.length - this.selectionEnd, this.value.length - this.selectionStart + 1];
					
				}

				Input.removeChars(textCont, rangeToDel);
			}
			
			if( e.charCode && !(e.metaKey || e.ctrlKey) || newLine ){
				var dir = charDir.check(charString); 
				if( dir == 'rtl' || (dir == '' && charDir.lastDir == 'rtl' ) )
					appendIndex = this.value.length - this.selectionStart;
					
				if( newLine )
					charString = '';
				
 				
				Input.maskPassword(this);
				
				Input.writer(charString, this, appendIndex);
			}
		},
		
		input : function(){
			Input.textLength = this.value.length; 
			Input.inputResize( this );
		},
		
		
		maskPassword : function(input){
			if( input.type == 'password' )
				$(input.nextElementSibling).find('span').each(function(){
					this.innerHTML = '';
				});
		},
		
		
		setCaretHeight : function(input){
			var lettersWrap = $(input.nextElementSibling);
			if( !lettersWrap.find('span').length )
				return false;
			letterHeight = lettersWrap.find('span')[0].clientHeight;
			lettersWrap.find('b').height(letterHeight);
		},
		
		writer : function(charString, input, appendIndex){
			var chars = $(input.nextElementSibling).children().not('b'), 
				newCharElm = document.createElement('span');
			
			if( charString == ' ' ) // space
				charString = '&nbsp;';
			
			if( charString ){
				newCharElm.innerHTML = charString;
				this.classToggler = this.classToggler == 'state2' ? 'state1' : 'state2';
				newCharElm.className = this.classToggler;
			}
			else
				newCharElm = document.createElement('br');
			
			if( chars.length ){
				if( appendIndex == 0 ) 
					$(input.nextElementSibling).prepend(newCharElm);
				else{
					var appendPos = chars.eq(--appendIndex);
					appendPos.after(newCharElm);
				}
			}
			else
				input.nextElementSibling.appendChild(newCharElm);

			if( charString)
				setTimeout(function(){
					newCharElm.removeAttribute("class");
				},20);
			
			return this;
		},

		clear : function(textCont){
			var caret = $(textCont.parentNode).find('.caret');
			$(textCont).html(caret);
		},
		
		
		fillText : function(text, input){
			var charsCont = input.nextElementSibling, 
				newCharElm,
				frag = document.createDocumentFragment();

			Input.clear( input.nextElementSibling );
			
			setTimeout( function(){
				var length = text.length;
					
				for( var i=0; i < length; i++ ){
					var newElm = 'span';
					//Input.writer( text[i], input, i);
					if( text[i] == '\n' )
						newElm = 'br';
					newCharElm = document.createElement(newElm);
					newCharElm.innerHTML = (text[i] == ' ') ? '&nbsp;' : text[i];
					frag.appendChild(newCharElm);
				}
				charsCont.appendChild(frag);
			},0);
		},
		
		
		removeChars : function(el, range){
			var allChars = $(el).children().not('b').not('.deleted'), 
				caret = $(el).find('b'),
				charsToRemove;
			
			if( range[0] == range[1] )
				range[0]--;
				
			charsToRemove = allChars.slice(range[0], range[1]);
				
			if( range[1] - range[0] == 1 ){
				charsToRemove.css('position','absolute');
				if(isWebkit)
					charsToRemove[0].offsetLeft;
				charsToRemove.addClass('deleted');
				setTimeout(function(){
					charsToRemove.remove();
				},140);
			}
			else
				charsToRemove.remove();
		},
		
		
		inputResize : function(el){
			if( el.tagName == 'TEXTAREA' ){
				setTimeout(function(){
					el.style.top = '-999px';
					var newHeight = el.parentNode.scrollHeight;
					
					if( $(el).outerHeight() < el.parentNode.scrollHeight )
						newHeight += 10;
					
					el.style.height = newHeight + 'px';
					el.style.top = '0';
					
					setTimeout(function(){
						el.scrollTop = 0;
						el.parentNode.scrollTop = 9999;
					},50);
				},0);
			}
			if( el.tagName == 'INPUT' && el.type == 'text' ){
				el.style.width = 0;
				var newWidth = el.parentNode.scrollWidth
				// if there is a scroll (or should be) adjust with some extra width
				if( el.parentNode.scrollWidth > el.parentNode.clientWidth )
					newWidth += 20;
				
				el.style.width = newWidth + 'px';
				
			}
		},
		
		keydown : function(e){
			var charString = String.fromCharCode(e.charCode),
				textCont = this.nextElementSibling,  // text container DIV
				appendIndex = this.selectionEnd,
				undo = ((e.metaKey || e.ctrlKey) && e.keyCode == 90) || (e.altKey && e.keyCode == 8),
				redo = (e.metaKey || e.ctrlKey) && e.keyCode == 89,
				selectAll = (e.metaKey || e.ctrlKey) && e.keyCode == 65,
				caretAtEndNoSelection = (this.selectionEnd == this.selectionStart && this.selectionEnd == this.value.length ),
				deleteKey = e.keyCode == 46 && !caretAtEndNoSelection;

			Input.setCaret(this);
			
			if( selectAll )
				return true;

			if( undo || redo ){
				
				setTimeout( function(){
					Input.fillText(e.target.value, e.target);
				}, 50);
				return true;
			}
			
			
			
			if( e.keyCode == 8 || deleteKey ){
				var selectionRange = [this.selectionStart, this.selectionEnd];
				if( charDir.lastDir == 'rtl' )
					selectionRange = [this.value.length - this.selectionEnd, this.value.length - this.selectionStart + 1];
					
			
				if( deleteKey && (this.selectionEnd == this.selectionStart && this.selectionEnd < this.value.length) ){
					selectionRange[0] += 1;
					selectionRange[1] += 1;
					Input.removeChars(textCont, selectionRange);
				}
				else
					setTimeout(function(){ 
						if( e.metaKey || e.ctrlKey ) 
							selectionRange = [e.target.selectionStart, selectionRange[0]];
						Input.removeChars(textCont, selectionRange);
					},0);
			}
			
			
			if( this.selectionStart == 0 )
				this.parentNode.scrollLeft = 0;
				
			return true;
		},
		
		allEvents : function(e){
			Input.setCaret(this);
			
			if( e.type == 'paste' ){
				setTimeout(function(){
					Input.fillText(e.target.value, e.target);
					Input.inputResize(e.target);
				},20);
			}
			if( e.type == 'cut' ){
				Input.removeChars(this.nextElementSibling, [this.selectionStart, this.selectionEnd]);
			}
			
			
			if( !e.keyCode || e.keyCode < 50 )
				Input.maskPassword(this);
			

			if( !letterHeight ){
			
				setTimeout(function(){ Input.setCaretHeight(e.target) }, 150);
			}
			
			if( this.selectionStart == this.value.length )
				this.parentNode.scrollLeft = 999999; 
				
			this.nextElementSibling.className = this.value ? '' : 'empty';
				
		},
		
		setCaret : function(input){
			var caret = $(input.parentNode).find('.caret'),
				allChars =  $(input.nextElementSibling).children().not('b'),
				chars = allChars.not('.deleted'),
				pos = Input.getCaretPosition(input);

				if( charDir.lastDir == 'rtl' ) 
					pos = input.value.length - pos;

			var	insertPos = chars.eq(pos);

			if(pos == input.value.length ){
				
					caret.appendTo( input.nextElementSibling );
			}
			else
				caret.insertBefore( insertPos );
		},
		
		getCaretPosition : function(input){
			var caretPos, direction = getSelectionDirection.direction || 'right';
			if( input.selectionStart || input.selectionStart == '0' )
				caretPos = direction == 'left' ? input.selectionStart : input.selectionEnd;

			return caretPos || 0;
		}
	},

	getSelectionDirection = {
		direction : null,
		lastOffset : null,
		set : function(e){
			var d;
			if( e.shiftKey && e.keyCode == 37 )
				d = 'left';
			else if( e.shiftKey && e.keyCode == 39 )
				d = 'right';
			if( e.type == 'mousedown' )
				getSelectionDirection.lastOffset = e.clientX;
			else if( e.type == 'mouseup' )
				d = e.clientX < getSelectionDirection.lastOffset ? 'left' : 'right';
				
			getSelectionDirection.direction = d;
		}
	}, 

	charDir = {
		lastDir : null,
		check : function(s){
			var ltrChars        = 'A-Za-z\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u02B8\u0300-\u0590\u0800-\u1FFF'+'\u2C00-\uFB1C\uFDFE-\uFE6F\uFEFD-\uFFFF',
				rtlChars        = '\u0591-\u07FF\uFB1D-\uFDFD\uFE70-\uFEFC',
				ltrDirCheck     = new RegExp('^[^'+rtlChars+']*['+ltrChars+']'),
				rtlDirCheck     = new RegExp('^[^'+ltrChars+']*['+rtlChars+']');

			var dir = rtlDirCheck.test(s) ? 'rtl' : (ltrDirCheck.test(s) ? 'ltr' : '');
			if( dir ) this.lastDir = dir;
			return dir;
		}
	}

	function init(inputs){
		var selector = inputs.selector;

		inputs.each(function(){
			var className = 'Input',
				template = $('<div><b class="caret">&#8203;</b></div>');
				
			if( this.tagName == 'TEXTAREA' )
				className += ' textarea';
			
			$(this.parentNode).append(template).addClass(className);
	
			
			if( this.value )
				Input.fillText(this.value, this);
			
			if( this.placeholder ){
				template.attr('data-placeholder', this.placeholder);
				if( !this.value )
					template.addClass('empty');
			}
				
		});
		
		
		$(document)
		    .off('.fi', selector)
			.on('input.fi', selector, Input.input)
			.on('keypress.fi', selector, Input.keypress)
			.on('keyup.fi select.fi mouseup.fi cut.fi paste.fi blur.fi', selector, Input.allEvents)
			.on('mousedown.fi mouseup.fi keydown.fi', selector, getSelectionDirection.set)
			.on('keydown.fi', selector , Input.keydown);
	}

	window.Input = Input;
})(window.jQuery);
