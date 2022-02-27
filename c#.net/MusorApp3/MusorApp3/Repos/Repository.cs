using MusorApp3.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;


namespace MusorApp3.Repos
{
    public class Repository
    {
        public async Task<int> AddUser(User user)
        {
           using (var conn = new Datas())
            {
                var nextId = conn.Users.Select(x => x.Id).Max() + 1;
                user.Id = nextId;
                user.IsAdmin = false;
                conn.Users.Add(user);
                conn.SaveChanges();


                return nextId;

            }
            
        }

        public async Task<int> AddFavourite(UserFavourite userFavourite)
        {
            using (var conn = new Datas())
            {
                conn.UserFavourites.Add(userFavourite);
                conn.SaveChanges();


                return userFavourite.Id;

            }

        }

        public async Task<int> AddChannelList(UserFavourite userFavorite)
        {
            using (var conn = new Datas())
            {
                var nextId = conn.UserFavourites.Select(x => x.Id).Max() + 1;
              
                userFavorite.Id = nextId;

                conn.UserFavourites.Add(userFavorite);
                conn.SaveChanges();


                return nextId;

            }
        }

       
    }

    
}
