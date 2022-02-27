using Microsoft.AspNetCore.Mvc;
using MusorApp3.Models;
using System;
using System.Collections.Generic;
using System.Dynamic;
using System.IO;
using System.Linq;
using System.Threading.Tasks;
using System.Xml.Serialization;

namespace MusorApp3.Controllers
{
    public class ShowPageController : Controller
    {
        [HttpGet]
        public IActionResult ShowPage(int channelId, int categoryId)
        {
            
            using (var conn = new Datas())
            {
                // xml be importálás
                //XmlSerializer serialiser = new XmlSerializer(typeof(List<TvProgram>));
               // System.IO.TextWriter filestream = new StreamWriter(@"C:\output.xml");

                var tvPrograms = conn.TvPrograms.Where(x => x.Channel == channelId).ToList();
                var model = new MusorApp3.Models.MVC.SHOWPAGE() { tvPrograms = tvPrograms, channelId = channelId };

                //ViewData["TvMusorok"] = tvPrograms;
                //ViewData["ChannelID"] = channelId;
                // serialiser.Serialize(filestream, tvPrograms);
                // filestream.Close();

                return View("~/Views/ShowPage/ShowPage.cshtml", model);
            }
            
        }
        [HttpPost]
        public ActionResult SelectChannelCategory(int channelId, int categoryId)
        {
            using (var conn = new Datas())
            {
                var tvPrograms = new List<TvProgram>();
                if (categoryId > 0)
                {
                    var listCategories = conn.CategoriesCs.Where(x => x.CategoryId == categoryId).Select(x => x.ShowId).ToList();
                    var listShows = conn.Shows.Where(x => listCategories.Any(y => y == x.Id)).Select(x => x.ShowTitle).ToList();

                    tvPrograms = conn.TvPrograms.Where(x => x.Channel == channelId && listShows.Any(y => y == x.Title)).ToList();
                }
                else
                {
                    tvPrograms = conn.TvPrograms.Where(x => x.Channel == channelId).ToList();
                }
                var model = new MusorApp3.Models.MVC.SHOWPAGE() { tvPrograms = tvPrograms, channelId = channelId };

              
                return View("~/Views/ShowPage/ShowPage.cshtml", model);
            }
        }
    }
}
