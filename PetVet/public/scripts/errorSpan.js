"use strict";

class ErrorSpan
{
    constructor(id,message)
    {
        this._id = id;
        this._message = message;
    }
    
    showSpan()
    {
        // créeer la span
        let span = document.createElement("span");
        // insérer un message 
        span.textContent = this._message;
        span.classList.add('form-error');
        
        document.getElementById(this._id).after(span);
    }
}

export default ErrorSpan;