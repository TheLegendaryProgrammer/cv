using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace MusorApp3.Models.MVC
{
    public class SHOWPAGE
    {
        public List<MusorApp3.Models.TvProgram> tvPrograms { get; set; }
        public int channelId;
        public int categoryId;
    }
}
