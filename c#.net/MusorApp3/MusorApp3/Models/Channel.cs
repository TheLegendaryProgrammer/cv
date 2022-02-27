using System;
using System.Collections.Generic;

#nullable disable

namespace MusorApp3.Models
{
    public partial class Channel : StandardEntity
    {
        public string Name { get; set; }
        public string Language { get; set; }
        public string Country { get; set; }
        public string PictureLink { get; set; }
    }
}
