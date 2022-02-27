using Microsoft.AspNetCore.Mvc;
using MusorApp3.Models;
using MusorApp3.Repos;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace MusorApp3.Controllers
{
    public class FavoritesController : Controller
    {
        public IActionResult Index()
        {
            return View();
        }


        public ActionResult Create(int channelId, int userid)
        {
            using (var conn = new Datas())
            {
                var model = new MusorApp3.Models.UserFavourite();
                model.ChannelId = channelId;
                model.UserId = userid;
                return View("~/Views/Favorites/Create.cshtml", model);
            }
        }
        [HttpPost]
        public async Task<ActionResult> AddFavourite(int channelId, int userId, string Name)
        {
            using (var conn = new Datas())
            {
                var channel = conn.Channels.Where(d => d.Id == channelId).FirstOrDefault();
                var user = conn.Users.Where(d => d.Id == userId).FirstOrDefault();
                var model = new MusorApp3.Models.UserFavourite();
                model.ChannelId = channelId;
                model.UserId = userId;
                model.Name = channel.Name;
                var repo = new Repository();
                await repo.AddFavourite(model);
                return View("");
            }
        }


    }
}

