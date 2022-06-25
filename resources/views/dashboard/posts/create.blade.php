@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Posts</h1>
</div>

<div class="log-lg-8">
<form method="post" action="/dashboard/posts" class="mb-5" enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" 
    required autofocus value="{{ old('title') }}">
    @error('title')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="slug" class="form-label">Slug</label>
    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" 
    required value="{{ old('slug') }}">
    @error('slug')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="category" class="form-label">Category</label>
    <select class="form-select" name="category_id">
    @foreach ($categories as $category)
      @if(old('category_id') == $category->id)
      <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
      @else
      <option value="{{ $category->id }}">{{ $category->name }}</option>
      @endif
    @endforeach
</select>
  </div>
  <div class="mb-3">
  <label for="image" class="form-label">Default file input example</label>
  <img class="img-preview img-fluid mb-3 col-sm-5">
  <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
  @error('image')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
</div>
  <div class="mb-3">
    <label for="body" class="form-label">Body</label>
    <textarea type="text" class="form-control @error('body') is-invalid @enderror" id="body" name="body" 
    value="{{ old('body') }}"></textarea>
    @error('body')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>

  <!-- WYSIWYG -->
  <!-- <div class="wp-webdeasy-comment-editor">
    <div class="toolbar">
      <div class="line">
        <div class="box">
          <span
            class="editor-btn icon smaller"
            data-action="bold"
            data-tag-name="b"
            title="Bold"
          >
            <img
              src="https://img.icons8.com/fluency-systems-filled/48/000000/bold.png"
            />
          </span>
          <span
            class="editor-btn icon smaller"
            data-action="italic"
            data-tag-name="i"
            title="Italic"
          >
            <img
              src="https://img.icons8.com/fluency-systems-filled/48/000000/italic.png"
            />
          </span>
          <span
            class="editor-btn icon smaller"
            data-action="underline"
            data-tag-name="u"
            title="Underline"
          >
            <img
              src="https://img.icons8.com/fluency-systems-filled/48/000000/underline.png"
            />
          </span>
          <span
            class="editor-btn icon smaller"
            data-action="strikeThrough"
            data-tag-name="strike"
            title="Strike through"
          >
            <img
              src="https://img.icons8.com/fluency-systems-filled/30/000000/strikethrough.png"
            />
          </span>
        </div>
  
        <div class="box">
          <span class="editor-btn icon has-submenu">
            <img
              src="https://img.icons8.com/fluency-systems-filled/48/000000/align-left.png"
            />
            <div class="submenu">
              <span
                class="editor-btn icon"
                data-action="justifyLeft"
                data-style="textAlign:left"
                title="Justify left"
              >
                <img
                  src="https://img.icons8.com/fluency-systems-filled/48/000000/align-left.png"
                />
              </span>
              <span
                class="editor-btn icon"
                data-action="justifyCenter"
                data-style="textAlign:center"
                title="Justify center"
              >
                <img
                  src="https://img.icons8.com/fluency-systems-filled/48/000000/align-center.png"
                />
              </span>
              <span
                class="editor-btn icon"
                data-action="justifyRight"
                data-style="textAlign:right"
                title="Justify right"
              >
                <img
                  src="https://img.icons8.com/fluency-systems-filled/48/000000/align-right.png"
                />
              </span>
              <span
                class="editor-btn icon"
                data-action="formatBlock"
                data-style="textAlign:justify"
                title="Justify block"
              >
                <img
                  src="https://img.icons8.com/fluency-systems-filled/48/000000/align-justify.png"
                />
              </span>
            </div>
          </span>
          <span
            class="editor-btn icon"
            data-action="insertOrderedList"
            data-tag-name="ol"
            title="Insert ordered list"
          >
            <img
              src="https://img.icons8.com/fluency-systems-filled/48/000000/numbered-list.png"
            />
          </span>
          <span
            class="editor-btn icon"
            data-action="insertUnorderedList"
            data-tag-name="ul"
            title="Insert unordered list"
          >
            <img
              src="https://img.icons8.com/fluency-systems-filled/48/000000/bulleted-list.png"
            />
          </span>
          <span
            class="editor-btn icon"
            data-action="outdent"
            title="Outdent"
            data-required-tag="li"
          >
            <img
              src="https://img.icons8.com/fluency-systems-filled/48/000000/outdent.png"
            />
          </span>
          <span class="editor-btn icon" data-action="indent" title="Indent">
            <img
              src="https://img.icons8.com/fluency-systems-filled/48/000000/indent.png"
            />
          </span>
        </div>
        <div class="line">
        <div class="box">
          <span class="editor-btn icon smaller" data-action="undo" title="Undo">
            <img
              src="https://img.icons8.com/fluency-systems-filled/48/000000/undo--v1.png"
            />
          </span>
          <span
            class="editor-btn icon"
            data-action="removeFormat"
            title="Remove format"
          >
            <img
              src="https://img.icons8.com/fluency-systems-filled/48/000000/remove-format.png"
            />
          </span>
        </div>
  
        <div class="box">
          <span
            class="editor-btn icon"
            data-action="toggle-view"
            title="Show HTML-Code"
          >
            <img
              src="https://img.icons8.com/fluency-systems-filled/48/000000/source-code.png"
            />
          </span>
        </div>
      </div>
    </div>
    <div class="content-area">
      <div class="visuell-view" contenteditable></div>
      <div class="mb-3">
      <label for="body" class="form-label"></label>
      <textarea class="html-view" type="text" class="form-control" id="body" name="body"></textarea>
    </div>
  </div>
  
  <div class="modal">
    <div class="modal-bg"></div>
    <div class="modal-wrapper">
      <div class="close">✖</div>
      <div class="modal-content" id="modalCreateLink">
        <h3>Insert Link</h3>
        <input
          type="text"
          id="linkValue"
          placeholder="Link (example: https://webdeasy.de/)"
        />
        <div class="row">
          <input type="checkbox" id="new-tab" />
          <label for="new-tab">Open in new Tab?</label>
        </div>
        <button class="done">Done</button>
      </div>
    </div>
  </div>
</div>
      </div> -->
  
  <button type="submit" class="btn btn-primary">Create post</button>
</form>
</div>

<script>
    const title = documnet.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/dashboard/posts/checkSlug?title=' + title.value)
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