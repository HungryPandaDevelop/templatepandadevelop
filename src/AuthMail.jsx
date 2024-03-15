import React from 'react'

const AuthMail = () => {
  return (
    <>
      <div className="input-box">
        <label>Логин</label>
        <div className="ico-field">
          <input className="input-decorate" type="text" placeholder="Логин"/><i className="user-ico"></i>
        </div>
      </div>
      <div className="input-box">
        <label>Пароль</label>
        <div className="password-field">
          <input className="input-decorate" type="password" placeholder="Пароль"/><i data-visibility="false"></i>
        </div>
      </div>
      <div className="input-box">
        <div className="checkbox agreement">
          <label>Запомнить меня
            <input type="checkbox" checked/><span></span>
          </label>
        </div>
      </div>
      <div className="input-box">
        <div className="form-btn-container col-12">
          <input className="btn btn--blue" type="submit" value="Войти"/>
        </div>
      </div> 
    </>
  )
}

export default AuthMail
