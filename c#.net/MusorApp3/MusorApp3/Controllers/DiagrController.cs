using Microsoft.AspNetCore.Mvc;
using MusorApp3.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace MusorApp3.Controllers
{
    public class DiagrController : Controller
    {
        public IActionResult Index()
        {
            return View();
        }

        public IActionResult Diagr()
        {

            using (var conn = new Datas())
            {
                var tvPrograms = new List<TvProgram>();

                var categories = conn.Categories.Select(x => x.Categorie).ToList();
                var categoriesList = conn.Categories.ToList();

                var connectedList = conn.CategoriesCs;



                ViewBag.xData = new[] { categories };

                
            }
                

            return View();
        }
    }
}
