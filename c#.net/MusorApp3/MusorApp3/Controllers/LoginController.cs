using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using MusorApp3.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace MusorApp3.Controllers
{
    public class LoginController : Controller
    {
        public IActionResult Login()
        {
            return View();
        }

        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Login(User objUser)
        {
            if (ModelState.IsValid)
            {
                using (var conn = new Datas())
                {
                    var obj = conn.Users.Where(a => a.Username.Equals(objUser.Username) && a.Password.Equals(objUser.Password)).FirstOrDefault();
                    if (obj != null)
                    {
                        HttpContext.Session.SetString("SessionName" , obj.Username);
                        HttpContext.Session.SetInt32("SessionId" , obj.Id);
                        return RedirectToAction("Index", "Home");
                    }
                }
            }
            return View(objUser);
        }
    }
}
