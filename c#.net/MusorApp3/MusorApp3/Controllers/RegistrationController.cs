using Microsoft.AspNetCore.Mvc;
using MusorApp3.Models;
using MusorApp3.Repos;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace MusorApp3.Controllers
{
    public class RegistrationController : Controller
    {
        

        
        public IActionResult Registration()
        {
            return View();
        }
      
        [HttpPost]
        [ValidateAntiForgeryToken]
        public async Task<IActionResult> Create(User uc)
        {
            using (var conn = new Datas())
            {
                var obj = conn.Users.Where(a => a.Username.Equals(uc.Username)).FirstOrDefault();
                if (obj != null)
                {

                    return View();
                }
            }
            var repo = new Repository();
            uc.Id = 0;
            await repo.AddUser(uc);
            ViewBag.message = "The user " + uc.Username + " is saved successfully";
            return RedirectToAction("Login", "Login");
        }
    }
}
