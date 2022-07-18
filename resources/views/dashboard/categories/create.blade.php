@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Categories</h1>
</div>

<div class="log-lg-8">
<form method="post" action="/dashboard/categories" class="mb-5" enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Categories</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" 
    required autofocus value="{{ old('') }}">
    @error('name')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>
  
  <button type="submit" class="btn btn-primary">Create post</button>
</form>
</div>

<script>
    const category = documnet.querySelector('#name');

    title.addEventListener('change', function() {
        fetch('/dashboard/categories/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data = => slug.value = data.slug)
    });

    // document.addEventListener('tric-file-accept', function(e){
    //   e.preventDefault();
    // })

    function previewImage(){
      const image = document.querySelector('#image');
      const imgPreview = document.querySelector('.#img-preview');

      imgPreview.style.display = 'block';

      const oFReader= new FileReader();
      oFReader.readAsDataURL(image.files[0]);

      oFReader.onload = function(oFREvent){
        imgPreview.src = oFREvent.target.result;
      }
    }
</script>

<!-- <script>
  // define vars
const editor = document.getElementsByClassName('wp-webdeasy-comment-editor')[0];
const toolbar = editor.getElementsByClassName('toolbar')[0];
const buttons = toolbar.querySelectorAll('.editor-btn:not(.has-submenu)');
const contentArea = editor.getElementsByClassName('content-area')[0];
const visuellView = contentArea.getElementsByClassName('visuell-view')[0];
const htmlView = contentArea.getElementsByClassName('html-view')[0];
const modal = document.getElementsByClassName('modal')[0];

// add active tag event
document.addEventListener('selectionchange', selectionChange);

// add paste event
visuellView.addEventListener('paste', pasteEvent);

// add paragraph tag on new line
contentArea.addEventListener('keypress', addParagraphTag);

// add toolbar button actions
for(let i = 0; i < buttons.length; i++) {
  let button = buttons[i];
  
  button.addEventListener('click', function(e) {
    let action = this.dataset.action;
    
    switch(action) {
      case 'toggle-view':
        execCodeAction(this, editor);
        break;
      case 'createLink':
        execLinkAction();
        break;
      default:
        execDefaultAction(action);
    }
    
  });
}

/** 
 * This function toggles between visual and html view
 */
function execCodeAction(button, editor) {

  if(button.classList.contains('active')) { // show visuell view
    visuellView.innerHTML = htmlView.value;
    htmlView.style.display = 'none';
    visuellView.style.display = 'block';

    button.classList.remove('active');     
  } else {  // show html view
    htmlView.innerText = visuellView.innerHTML;
    visuellView.style.display = 'none';
    htmlView.style.display = 'block';

    button.classList.add('active'); 
  }
}

/**
 * This function adds a link to the current selection
 */
function execLinkAction() {  
  modal.style.display = 'block';
  let selection = saveSelection();

  let submit = modal.querySelectorAll('button.done')[0];
  let close = modal.querySelectorAll('.close')[0];
  
  // done button active => add link
  submit.addEventListener('click', function(e) {
    e.preventDefault();
    let newTabCheckbox = modal.querySelectorAll('#new-tab')[0];
    let linkInput = modal.querySelectorAll('#linkValue')[0];
    let linkValue = linkInput.value;
    let newTab = newTabCheckbox.checked;    
    
    restoreSelection(selection);
    
    if(window.getSelection().toString()) {
      let a = document.createElement('a');
      a.href = linkValue;
      if(newTab) a.target = '_blank';
      window.getSelection().getRangeAt(0).surroundContents(a);
    }

    modal.style.display = 'none';
    linkInput.value = '';
    
    // deregister modal events
    submit.removeEventListener('click', arguments.callee);
    close.removeEventListener('click', arguments.callee);
  });  
  
  // close modal on X click
  close.addEventListener('click', function(e) {
    e.preventDefault();
    let linkInput = modal.querySelectorAll('#linkValue')[0];
    
    modal.style.display = 'none';
    linkInput.value = '';
    
    // deregister modal events
    submit.removeEventListener('click', arguments.callee);
    close.removeEventListener('click', arguments.callee);
  });
}

/**
 * This function executes all 'normal' actions
 */
function execDefaultAction(action) {
  document.execCommand(action, false);
}

/**
 * Saves the current selection
 */
function saveSelection() {
    if(window.getSelection) {
        sel = window.getSelection();
        if(sel.getRangeAt && sel.rangeCount) {
            let ranges = [];
            for(var i = 0, len = sel.rangeCount; i < len; ++i) {
                ranges.push(sel.getRangeAt(i));
            }
            return ranges;
        }
    } else if (document.selection && document.selection.createRange) {
        return document.selection.createRange();
    }
    return null;
}

/**
 *  Loads a saved selection
 */
function restoreSelection(savedSel) {
    if(savedSel) {
        if(window.getSelection) {
            sel = window.getSelection();
            sel.removeAllRanges();
            for(var i = 0, len = savedSel.length; i < len; ++i) {
                sel.addRange(savedSel[i]);
            }
        } else if(document.selection && savedSel.select) {
            savedSel.select();
        }
    }
}

/**
 * Sets the current selected format buttons active/inactive
 */ 
function selectionChange(e) {
  
  for(let i = 0; i < buttons.length; i++) {
    let button = buttons[i];
    
    // don't remove active class on code toggle button
    if(button.dataset.action === 'toggle-code') continue;
    
    button.classList.remove('active');
  }
  
  if(!childOf(window.getSelection().anchorNode.parentNode, editor)) return false;
  
  parentTagActive(window.getSelection().anchorNode.parentNode);
}

/**
 * Checks if the passed child has the passed parent
 */
function childOf(child, parent) {
  return parent.contains(child);
}

/**
 * Sets the tag active that is responsible for the current element
 */
function parentTagActive(elem) {
  if(!elem ||!elem.classList || elem.classList.contains('visuell-view')) return false;
  
  let toolbarButton;
  
  // active by tag names
  let tagName = elem.tagName.toLowerCase();
  toolbarButton = document.querySelectorAll(`.toolbar .editor-btn[data-tag-name="${tagName}"]`)[0];
  if(toolbarButton) {
    toolbarButton.classList.add('active');
  }
  
  // active by text-align
  let textAlign = elem.style.textAlign;
  toolbarButton = document.querySelectorAll(`.toolbar .editor-btn[data-style="textAlign:${textAlign}"]`)[0];
  if(toolbarButton) {
    toolbarButton.classList.add('active');
  }
  
  return parentTagActive(elem.parentNode);
}

/**
 * Handles the paste event and removes all HTML tags
 */
function pasteEvent(e) {
  e.preventDefault();
  
  let text = (e.originalEvent || e).clipboardData.getData('text/plain');
  document.execCommand('insertHTML', false, text);
}

/**
 * This functions adds a paragraph tag when the enter key is pressed
 */
function addParagraphTag(evt) {
  if (evt.keyCode == '13') {
    
    // don't add a p tag on list item
    if(window.getSelection().anchorNode.parentNode.tagName === 'LI') return;
    document.execCommand('formatBlock', false, 'p');
  }
}
</script> -->
@endsection